<div id="jadhaham-detail">
<div class="col-md-6 basic_1-left">
  <?php
    $extension = pathinfo($profile->jadhaham);
  ?>
  @if (isset($extension['extension']) && in_array($extension['extension'],array('png','jpg','jpeg','gif','bmp')))
      <div style="cursor:zoom-in;opacity:0.3;position:absolute;width:200px;height:200px;background-color:#fff;" onclick="showImageModal('jadhaham_image')"></div>
      <img src="{{asset('assets/jadhahamimages/'.$profile->jadhaham)}}" id="jadhaham_image"  width="200" height="200" />
  @else
  	  <a href="{{asset('assets/jadhahamimages/'.$profile->jadhaham)}}" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> View</a>
  @endif
</div>
<div class="clearfix"> </div>
</div>