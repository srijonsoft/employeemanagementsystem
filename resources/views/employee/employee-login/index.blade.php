@extends('layouts.app')
@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">Login Details</div>
		<div class="panel-body"> A long description about me.

		</div>
	</div>
    <div class="panel panel-default target">
        <div class="panel-heading" contenteditable="false">Pets I Own</div>
        <div class="panel-body">
            <div class="row">
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/people">
						<div class="caption">
							<h3>
								Rover
							</h3>
							<p>
								Cocker Spaniel who loves treats.
							</p>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/city">
						<div class="caption">
							<h3>
								Marmaduke
							</h3>
							<p>
								Is just another friendly dog.
							</p>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/sports">
						<div class="caption">
							<h3>
								Rocky
							</h3>
							<p>
								Loves catnip and naps. Not fond of children.
							</p>
							<p>
							
							</p>
						</div>
                </div> 
            </div>     
            </div>    
        </div>   
    </div>
@endsection