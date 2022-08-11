@extends('layouts.backend')
<!-- title -->
@section('title',$title)
<!-- internal css -->
@push('styles')
<style>
  .question_add {
            width: 25px;
            height: 25px;
            line-height: 15px;
            text-align: center;
            padding: 5px;
            display: block;
        }
        .questions{
            margin-bottom: 20px !important;
        }
        .questions:last-child{
            margin-bottom: 0;
        }
        .plus-minus-btn a{
            display: inline-block;
        }
</style>
@endpush

@section('main-content')
<div class="app-main__inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $title }}</h4>
                </div>
                <div class="card-body">
                     <form action="{{ route('admin.job-post.update', $job_post->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                        @csrf
                        @isset($job_post)
                            @method('PUT')
                        @endisset
                        <div class="row-mb">
                            <div class="row mb-4">
                                <x-horizontal-form.selectbox name="status" inputClass="select" required="required" labelName="Status" errorName="status">
                                    @foreach (STATUS as $key=>$value)
                                        <option value="{{ $key }}" @isset($job_post) {{  $job_post->status == $key ? 'selected' : '' }} @endisset>{{ $value }}</option>
                                    @endforeach
                                </x-horizontal-form.selectbox>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fas fa-check fa-sm"></i>
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- internal js -->
@push('scripts')

<script>
     function add_work_step(){
            $('#how-works .work-title').last().clone().find('input, textarea').val('').end().appendTo('#more_input_field');
        }

        function remove_work_step(){
            $('#more_input_field .work-title').last().remove();
        }
</script>
@endpush
