@php

// $value = is the file path
    $value = data_get($entry, $column['name']);
// get file type if video or image by extension in path
    $arr = [];
    foreach ($value as $index => $file){
        $fileType = explode('.', $file);
        $fileType = $fileType[count($fileType)-1];
        $fileType = strtolower($fileType);
        $fileType = str_replace('jpg', 'image', $fileType);
        $fileType = str_replace('jpeg', 'image', $fileType);
        $fileType = str_replace('mp4', 'video', $fileType);
        $fileType = str_replace('wav', 'video', $fileType);
        $fileType = str_replace('gif', 'image', $fileType);
        $fileType = str_replace('png', 'image', $fileType);
        $fileType = str_replace('svg', 'image', $fileType);
        $fileType = str_replace('bmp', 'image', $fileType);
        $fileType = str_replace('tiff', 'image', $fileType);
        $fileType = str_replace('tif', 'image', $fileType);
        $fileType = str_replace('eps', 'image', $fileType);
        $fileType = str_replace('ico', 'image', $fileType);


        $arr[$index]['path'] = $file;
        $arr[$index]['type'] = $fileType;
    }

@endphp

@foreach($arr as $file)
<a href="{{ asset($file['path']) }}" target="_blank">
    @if($file['type'] == 'image')
        <img src="{{ asset($file['path']) }}" style="border: 1.5px solid;" width="80px" height="80px" alt="image">
    @else
        <video  width="80px" height="70px" style="border: 2px solid;" title="video"   src="{{ asset($file['path']) }}"></video>
    @endif
</a>
@endforeach
