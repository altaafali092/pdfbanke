@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Feedback Or Queyr DataTables</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Data Table</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $key=>$contact)
                                <tr>
                                    <td>{{ $contacts->firstItem() + $key }}</td>
                                    <td> {{ $contact->name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>
                                        <form action="{{ route('admin.contact.destroy', $contact) }}" method="post"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="btn
                                        btn-danger text-white"
                                                onclick="return confirm('Are you sure want to Delete')">
                                                Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <center>No data found.</center>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- {{ $contacts->contact() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
