@extends('layouts.admin_layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Member List
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Member List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="data-table table table-bordered table-striped">
              <thead>
                <tr>
                   <th>Sl No.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Rate</th>
                    <th>Manage</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  $count = 0;
                  foreach ($members as $member) {
                    echo '<tr>';
                    echo '<td>'.++$count.'</td>';
                    echo '<td>'.$member->username.'</td>';
                    echo '<td>'.$member->email.'</td>';
                    echo '<td>'.$member->gender.'</td>';
                    echo '<td>';
                    $from_date = new DateTime($member->date_of_birth);
                    $to_date = new DateTime('today');
                    echo $to_date->diff($from_date)->y;
                    echo '</td>';                    
                    echo '<td>';
                ?>
                    <div class="rating" data-member-id="{{$member->id}}" data-rating="{{$member->profile_rate/100*5}}">
                <?php
                    echo '</td>';
                    echo '<td>';
                 ?>
                    <a href="javascript:;" data-target="{{$member->id}}" class="view-member-class"> <i class="fa fa-eye"></i> View more</a><br/>
                  <?php
                    echo '</td>';
                    echo '</tr>';
                  }
                ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- page script -->
@endsection

@section('script')
<script type="text/javascript">
(function ( $ ) {
 
    $.fn.rating = function( method, options ) {
    method = method || 'create';
        // This is the easiest way to have default options.
        var settings = $.extend({
            // These are the defaults.
      limit: 5,
      value: 0,
      glyph: "glyphicon-star",
            coloroff: "gray",
      coloron: "gold",
      size: "2.0em",
      cursor: "default",
      onClick: function () {},
            endofarray: "idontmatter"
        }, options );
    var style = "";
    style = style + "font-size:" + settings.size + "; ";
    style = style + "color:" + settings.coloroff + "; ";
    style = style + "cursor:" + settings.cursor + "; ";
  

    
    if (method == 'create')
    {
      //this.html('');  //junk whatever was there
      
      //initialize the data-rating property
      this.each(function(){
        attr = $(this).attr('data-rating');
        if (attr === undefined || attr === false) { $(this).attr('data-rating',settings.value); }
      })
      
      //bolt in the glyphs
      for (var i = 0; i < settings.limit; i++)
      {
        this.append('<span data-value="' + (i+1) + '" class="ratingicon glyphicon ' + settings.glyph + '" style="' + style + '" aria-hidden="true"></span>');
      }
      
      //paint
      this.each(function() { paint($(this)); });

    }
    if (method == 'set')
    {
      this.attr('data-rating',options);
      this.each(function() { paint($(this)); });
    }
    if (method == 'get')
    {
      return this.attr('data-rating');
    }
    //register the click events
    this.find("span.ratingicon").click(function() {
      rating = $(this).attr('data-value')
      $(this).parent().attr('data-rating',rating);
      paint($(this).parent());
      settings.onClick.call( $(this).parent() );
    })
    function paint(div)
    {
      rating = parseInt(div.attr('data-rating'));
      div.find("input").val(rating);  //if there is an input in the div lets set it's value
      div.find("span.ratingicon").each(function(){  //now paint the stars
        
        var rating = parseInt($(this).parent().attr('data-rating'));
        var value = parseInt($(this).attr('data-value'));
        if (value > rating) { $(this).css('color',settings.coloroff); }
        else { $(this).css('color',settings.coloron); }
      })
    }
    };
 
}( jQuery ));

$(".rating").rating('create',{
    cursor: 'pointer',
    coloron:'#ff7700',
    limit:5,
    glyph:'glyphicon-heart',
    onClick:function(){ 
      data = {id:$(this).attr('data-member-id'),profile_rate:$(this).attr('data-rating')*20};
      $.post( $('#base_url').val()+'admin/setRating', data).done(function( data ) {
      });
    }
});

</script>
@endsection