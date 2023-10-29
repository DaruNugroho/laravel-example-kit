<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> {{ $title }}
                    @if ($subTitle)
                        <small>{{ $subTitle }}</small>
                    @endif
                </h1>
            </div>
            @if (count($breadcrumb) > 0)
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @foreach ($breadcrumb as $item)
                            @if ($item['link'] == '#')
                                <li class="breadcrumb-item active">{{ $item['lable'] }}</li>
                            @else
                                <li class="breadcrumb-item">
                                    <a href="{{ $item['link'] }}">{{ $item['lable'] }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ol>
                </div>
            @endif
        </div>
    </div>
</div>
