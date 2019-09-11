@extends('layouts.main')

@section('content')
    <section class="section section--small-spacing carousel">
        <img src="/img/banner.jpg" alt="Banner" class="carousel__banner">
    </section>

    <div class="row section">
    	<div class="col-12 col-md-8">
    		<div class="row">
    			<div class="col-12">
            	<h2>Uniform</h2>
            	<div class="row-12">
            		<div class="col-8">
            		<p>
    					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur tempora dignissimos sint aperiam consequuntur! Ut temporibus quod quas, quae velit libero sit sunt accusamus? Quidem officiis, id tenetur quos placeat.
    					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dolores id, quam facere maxime, ipsa voluptatum suscipit explicabo eligendi dolorum voluptatibus, accusantium ratione itaque ad reprehenderit. At necessitatibus, reiciendis aut?
    				</p>
            	</div>
            	<div class="col-4">
    				 <img src="{{ asset('/img/uniform.jpg') }}" alt="Uniform" width="200">
            	</div>
            	</div>
    				<p>
    					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi cumque ab porro, sit voluptatibus minus voluptatem velit fuga est quasi! Repellat possimus, debitis eos. Repudiandae fugiat possimus similique aliquid molestiae!
    				</p>
    				<p>
    					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi cumque ab porro, sit voluptatibus minus voluptatem velit fuga est quasi! Repellat possimus, debitis eos. Repudiandae fugiat possimus similique aliquid molestiae!
    				</p>
    				<p>
    					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi cumque ab porro, sit voluptatibus minus voluptatem velit fuga est quasi! Repellat possimus, debitis eos. Repudiandae fugiat possimus similique aliquid molestiae!
    				</p>
    			</div>
    			<div class="col-12">
    				 <img src="{{ asset('/img/uniform-toelichting.png') }}" alt="Toelichting uniform" width="300">
    			</div>
    		</div>
    	</div>
        <div class="col-12 col-md-4">
            <h2>Shop</h2>
            <p>
            	De Fosshop is elke zaterdag open vanaf 17u.
            </p>
            <br>

            <table>
				<tr>
					<td>Uniformmaat 28-32</td>
					<td>€35,00</td>
				</tr>
				<tr>
					<td>Uniform maat 34-48</td>
					<td>€38,00</td>
				</tr>
				<tr>
					<td>T-shirt 207e FOS “De Eekhoorn”</td>
					<td>€10,00</td>
				</tr>
				<tr>
					<td>T-shirt 207e FOS “De Eekhoorn”</td>
					<td>€1,30</td>
				</tr>
				<tr>
					<td>Das</td>
					<td>€10,00</td>
				</tr>
				<tr>
					<td>Badges welpen/gidsen-verkenners</td>
					<td>€1,30</td>
				</tr>
				<tr>
					<td>Wolfje</td>
					<td>€1,50</td>
				</tr>
				<tr>
					<td>Ster</td>
					<td>€2,00</td>
				</tr>
				<tr>
					<td>Kenteken FOS Open Scouting België</td>
					<td>€1,50</td>
				</tr>
				<tr>
					<td>Belofteteken FOS Open Scouting</td>
					<td>€1,50</td>
				</tr>
				<tr>
					<td>Eenheidsteken</td>
					<td>€2,50</td>
				</tr>
				<tr>
					<td>Jaarteken</td>
					<td>€1,20</td>
				</tr>
				<tr>
					<td>Provincie "West-Vlaanderen"</td>
					<td>€0,50</td>
				</tr>
				<tr>
					<td>Kenteken Verkenner (jongens)</td>
					<td>€3,00</td>
				</tr>
				<tr>
					<td>Kenteken Gidsen (meisjes)</td>
					<td>€3,00</td>
				</tr>
			</table>
        </div>
    </div>
@endsection