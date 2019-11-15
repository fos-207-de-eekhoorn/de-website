@extends('layouts.main')

@section('content')
    <section class="section section--small-spacing banner banner--full">
        <img src="{{ asset('/img/banner.jpg') }}" alt="Banner" class="banner__banner">
    </section>

    <div class="row section">
    	<div class="col-12">
        	<h2>Privacy</h2>
    		<a href="https://scoutsoostkamp.be/sites/scoutsoostkamp.fossite.be/files/wysiwyg/2018-05_privacyverklaring.pdf" class="footer__bottom-text" target="_blank">Privacyverklaring FOS Open scoutsing</a>
    	</div>
    </div>
@endsection