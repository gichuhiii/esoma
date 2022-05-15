<div class="w-full">
    @foreach($uploads as $i => $upload)
    <a class="flex w-[90%] px-5 py-2  bg-blue-200 ml-14 text-xl hover:cursor-pointer" target="_blank"
        href={{asset("assets/".$upload->doc)}}>
        <p class="w-[90%] text-left pl-5">{{($i+1).". ".$upload->description}}</p>
        <x-feathericon-download class="text-right" />
    </a>
    @endforeach
</div>