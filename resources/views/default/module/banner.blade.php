@if(isset($banner) && $banner != NULL)
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php $i=0; ?>
        @foreach($banner as $item)
        <?php $i++; ?>
        <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}" class="{{ ($i == 1) ? "active" : "" }}"></li>
        @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" id="slide-image">
    <?php $stt=0; ?>
        @foreach($banner as $item)
        <?php $stt++; ?>
            <div class="item {{ ($stt == 1) ? 'active' : '' }}">
              <img data-src="{{ $item->images_avatar }}" alt="{{ $item->images_title }}">
              <div class="carousel-caption">
                {{ $item->images_description }}
              </div>
            </div>
        @endforeach
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
@endif
