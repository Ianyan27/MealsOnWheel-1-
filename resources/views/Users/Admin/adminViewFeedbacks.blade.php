@section('title')
    View Feedbacks
@endsection

@extends('Users.Admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Feedback Id</th>
                    <th>Name</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbackData as $feedback)
                <tr>
                    <td>
                        <input type="text" name="feedbackId" value="{{ $feedback->feedback_id }}" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" name="feedbackName" value="{{ $feedback->name }}" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="feedback" value="{{ $feedback->feedback }}" class="form-control">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection