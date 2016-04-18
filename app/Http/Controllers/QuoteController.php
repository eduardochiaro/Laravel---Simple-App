<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Author;
use App\Quote;

class QuoteController extends Controller
{
    public function getIndex($author = null){
	    
	    if(!is_null($author)){
		    $quote_author = Author::where('name', ucfirst($author))->first();
		    if($quote_author){
			    return $this->getAuthorQuotes($quote_author->id);
		    }
	    }
	    
	    $quotes = Quote::orderBy('created_at', 'desc')->paginate(6);
	    
	    return view('index', ['quotes'=> $quotes, 'author' => null]);
    }
    public function postQuote(Request $request){
	    
	    $this->validate($request, [
		    'author' => 'required|max:60|alpha',
		    'quote' => 'required|max:500'
	    ]);
	    
	    $authorText = ucfirst($request['author']);
	    $quoteText = $request['quote']; 
	    
	    
	    $author = Author::where('name', $authorText)->first();
	    if(!$author){
		    $author = new Author();
	    	$author->name = $authorText;
	    	$author->save();
		}
		
		$quote = new Quote();
		$quote->quote = $quoteText;
		
		$author->quotes()->save($quote);
		
		return redirect()->route('index')->with([
			'success' => 'Quote Saved!'
		]);
    }
    
    public function deleteQuote($quote_id){
	    $quote = Quote::find($quote_id);
	    
	    if(count($quote->author->quotes) === 1){
		    $quote->author->delete();
	    }
	    
	    $quote->delete();
	    
		return redirect()->route('index')->with([
			'success' => 'Quote Deleted!'
		]);
    }
    
    public function getAuthorQuotes($author_id){
	    
	    $author = Author::find($author_id);
	    if(empty($author)){
		    return redirect()->route('index');
	    }
	    
	    $quotes = $author->quotes()->orderBy('created_at', 'desc')->paginate(6);
	    
	    return view('index', ['quotes'=> $quotes, 'author' => $author]);
    }
}
