<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Create Portofolio') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="w-full">
                  <p>Foto Portofolio</p>
                  <input type="hidden" name="oldImg" value="{{ $portfolio->image }}">
                  @if ($portfolio->image)
                    <img src="{{ asset('storage/'. $portfolio->image) }}" class="img-preview container mb-3 max-w-xs mt-3">
                  @else   
                    <img class="img-preview container mb-3 max-w-xs mt-3">
                  @endif
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 my-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="file" name="image" id="image" onchange="previewImage()">

                  <p>Title Portofolio</p>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 my-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="title" value="{{ $portfolio->title }}">

                  <p>Nama Pembuat</p>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 my-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="keterangan" value="{{ $portfolio->keterangan }}">

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                  Save
                </button>
              </div>
            </form>
          </div>
      </div>
  </div>
</x-app-layout>

<script>
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>