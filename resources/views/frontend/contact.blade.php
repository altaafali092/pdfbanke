@extends('frontend.layouts.master')

@section('main-container')
    <div class="container-fluid py-2">
        <a href="https://pdfbanke.gov.np"><i class="fa fa-home" style="font-size: 20px;"> > सम्पर्क</i></a>
    </div>

    <div class="container-fluid py-4">
        <div class="row mb-3">
            <div class="col-md-3" style="background-color: rgb(28, 81, 16); margin-left:22px;">
                <div style="display: flex; justify-content: center; align-items: center;">
                    <i class="fa fa-phone" style="font-size: 40px; color: yellow;"></i>
                </div>
                <div class="text-center">
                    <h2 class="text-white">फोन</h2>
                    <span class="text-white">०८१-५६०२०१</span>
                </div>
            </div>
            <div class="col-md-3" style="background-color: rgb(28, 81, 16); margin-left:140px;">
                <div style="display: flex; justify-content: center; align-items: center;">
                    <i class="fa fa-map-marker" style="font-size: 40px; color:yellow;"></i>
                </div>
                <div class="text-center">
                    <h2 class="text-white">संपर्क ठेगाना</h2>
                    <span class="text-white">कुखुरा बिकास फार्म</span><br>
                    <span class="text-white">खजुरा, बाँके</span>
                </div>
            </div>
            <div class="col-md-3 " style="background-color: rgb(28, 81, 16); margin-left:180px;">
                <div style="display: flex; justify-content: center; align-items: center;">
                    <i class="fa fa-envelope" style="font-size: 40px; color: yellow;)"></i>
                </div>
                <div class="text-center">
                    <h2 class="text-white">फोन</h2>
                    <span class="text-white">०८१-५६०२०१</span>
                </div>
            </div>

        </div>

        <div class="container-fluid py-2">
            <div class="row">
                <div class="col">
                    <div class="form-control">
                        <form action="{{ route('contact') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Phone Number</label>
                                <input type="integer" class="form-control" name="phone" placeholder="Enter phone number ">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Subject</label>
                                <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
                                @error('subject')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Message</label>
                                <textarea class="form-control" placeholder="Leave a message here" name="message" id="floatingTextarea"></textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col">
                    <div style="padding-top: 25px"> <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d56299.450071304476!2d81.57326!3d28.124695!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3998617aa9744f87%3A0x590ea4a291cbe255!2sKhajura%2C%20Nepal!5e0!3m2!1sen!2sus!4v1656655997957!5m2!1sen!2sus"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
