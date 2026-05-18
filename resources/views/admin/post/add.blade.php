@extends('admin.layouts.app')

@section('title', 'Add Post')

@push('css')
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Post /</span> Add</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 d-flex align-content-around justify-content-center flex-wrap">
                                    <img id="imgpreview" src="{{ asset('admin-assets/img/backgrounds/default-image.png') }}" alt=""
                                        width="auto" height="150">
                                    <div class="">
                                        <label for="" class="d-flex justify-content-center mb-1">Recomended Size: 752 X 540</label>
                                        <input type="file" id="image" class="form-control" name="thumbnail"
                                        accept="image/png,image/jpeg,image/jpg,image/webp" required>
                                        @error('thumbnail')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror 
                                    </div>  
                                </div>
                                <div class="col-md-8">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Enter Title" value="{{old('title')}}" required/>
                                            @error('title')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <select name="category_id" id="" class="form-select" required>
                                                @forelse ($categories as $category)
                                                    @if ($category->id != 1)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endif
                                                @empty
                                                <option value="">No Category Found</option>  
                                                @endforelse
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" name="meta_title"
                                                placeholder="Enter meta title" value="{{old('meta_title')}}" required/>
                                            @error('meta_title')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter Meta Description" required>{{old('meta_description')}}</textarea>
                                            @error('meta_description')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <textarea name="meta_keywords" class="form-control" rows="2" placeholder="Enter Meta Keyword" required>{{old('meta_keywords')}}</textarea>
                                            @error('meta_keywords')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3 g-2">
                                <h6>Description</h6>
                                <textarea name="detail" class="form-control" required>{{old('detail')}}</textarea>
                                @error('detail')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="row mt-3 g-2 float-end">
                                <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
{{-- ck editor --}}
    <script>
        CKEDITOR.replace('detail', {
            skin: 'moono',
            enterMode: CKEDITOR.ENTER_BR,
            shiftEnterMode: CKEDITOR.ENTER_P,
            // fullPage : true,
            width: ['100%'],
            height: ['450px'],
            toolbar: [{
                    name: 'basicstyles',
                    groups: ['basicstyles'],
                    items: ['Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor']
                },
                {
                    name: 'styles',
                    items: ['Format', 'Font', 'FontSize']
                },
                {
                    name: 'justify',
                    groups: ['blocks', 'align'],
                    items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {
                    name: 'paragraph',
                    groups: ['list', 'indent'],
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
                {
                    name: 'insert',
                    items: ['Image']
                },
                {
                    name: 'spell',
                    items: ['jQuerySpellChecker']
                },
                {
                    name: 'table',
                    items: ['Table']
                }
            ],
        });
    </script>

    {{-- image preview --}}
    <script>
        $(document).ready(() => {
            $('#image').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#imgpreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

    @endpush
