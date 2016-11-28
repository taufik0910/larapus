<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Book;
use Laratrust\LaratrustFacade as Laratrust;

class GuestController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
{
if ($request->ajax()) {
$books = Book::with('author');
return Datatables::of($books)
->addColumn('action', function($book){
if (Laratrust::hasRole('admin')) return '';
return '<a class="btn btn-xs btn-primary" href="'.route('guest.books.borrow', $book->id).'">P
injam</a>';
})->make(true);
}
$html = $htmlBuilder
->addColumn(['data' => 'title', 'name'=>'title', 'title'=>'Judul'])
->addColumn(['data' => 'author.name', 'name'=>'author.name', 'title'=>'Penulis'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
return view('guest.index')->with(compact('html'));
}
}
