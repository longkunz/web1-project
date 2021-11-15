<div class="left_sidebar_area">
    <aside class="left_widgets p_filter_widgets">
        <div class="l_w_title">
            <h3>Browse Categories</h3>
        </div>
        <div class="widgets_inner">
            <ul class="list">
                @isset($categories)
                @foreach ($categories as $item)
                <li>
                    <a href="{{route('catproducts',$item->id)}}">{{$item->name}}</a>
                </li>
                @endforeach
                @endisset

            </ul>
        </div>
    </aside>
</div>
@push('styles')
<link rel="stylesheet" href="{{url('css/price_rangs.css')}}">
@endpush
@push('scripts')
<script src="{{url('js/price_rangs.js')}}"></script>
@endpush