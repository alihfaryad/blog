@extends('layouts.app')

@section('content')
<section id="contact">
    <div class="container">
        <div class="row justify-content-center" id="main-header">
            <div class="col-md-8 order-md-1 order-2">
                <h1>Contact Me</h1>
                <form action="<? $_PHP_SELF ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea name="message" class="form-control" required></textarea>
                    </div>
                    <button type="submit" name="contact">Send!</button>
                </form>
            </div>
            <div class="col-md-4 order-1 my-auto">
                <img src="/storage/images/contact.svg" alt="Contact" class="img-fluid" />
            </div>
        </div>
    </div>
</section> 
@endsection