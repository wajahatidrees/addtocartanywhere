@if($rules ?? '')
    @if ($rules->hasPages())
    <div class="app-pagination">
        <span class="button-group">
            @if ($rules->onFirstPage())
                <button type="button" class="disabled secondary icon-prev"></button>
            @else
                <a href="{{ $rules->previousPageUrl() }}" rel="prev"><button type="button" class="secondary icon-prev pagelink"></button></a>
            @endif
            @if ($rules->hasMorePages())
                <a href="{{ $rules->nextPageUrl() }}" rel="next"> <button type="button" class="secondary icon-next pagelink"></button></a>
            @else
                <button type="button" class="disabled secondary icon-next"></button>
            @endif
        </span>
    </div>
    @endif
@endif