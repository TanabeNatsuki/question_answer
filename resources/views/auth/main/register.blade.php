@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','register')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">本会員登録</div>

        @isset($message)
        <div class="card-body">
          {{$message}}
        </div>
        @endisset

        @empty($message)
        <div class="card-body">
          <form method="POST" action="{{ route('register.pre_check') }}">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
              <div class="col-md-6">
                 <input
                 id="name" type="text"
                 class="form-control{{ $errors->has('name') ? ' is-invalid' : ''}}"
                 name="name" value="{{ old('name') }}" required>

                 @if($errors->has('name'))
                 <span class="invalid-feedback">
                   <strong>{{ $errors->first('name') }}</strong>
                 </span>
                 @endif
               </div>
             </div>

             <div class="form-group row">
               <label for="name-pronunciation" type="text"
               class="form-control{{ $errors->has('name-pronunciation') ? 'is-invalid' : '' }}"
               name="name-pronunciation" value="{{ old('name-pronunciation') }}"
               required>

               @if($errors->has('name-pronunciation'))
               <span class="invalid-feedback">
                 <strong>{{ $errors->first('name-pronunciation') }}</strong>
               </span>
               @endif
                     </div>

                   <div class="form-group row mb-0">
                     <div class="col-md-6 offset-nd-4">
                       <button type="submit" class="btn btn-primary">
                         確認画面
                       </button>
                     </div>
                   </div>
                 </form>
               </div>
               @endempty
             </div>
           </div>
         </div>
       </div>
@endsection
