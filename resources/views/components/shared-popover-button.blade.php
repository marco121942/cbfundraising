@props(['normal' => true, 'evento', 'block' => true,])

@push('css')
<style type="text/css">
  .custom-popover {
    /*width: 80% !important;*/
    max-width: 500px !important;
  }
  .custom-popover > .popover-body > a {
    color: #d8a709 !important;
    text-decoration: none !important;
  }
  .custom-popover > .popover-body > a:hover {
    color: #4154f1 !important;
  }
</style>
@endpush



  <!-- data-bs-trigger="focus" data-bs-custom-class="custom-popover" -->
  @if( $normal === true )
<div class="p-0 m-0 text-center d-inline-block">
  <a tabindex="0"  data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" {{ $attributes->merge(['class' => 'ppverok btn btn-get-started text-center fs-6 p-2 px-4 my-0 d-flex align-items-center justify-content-center']) }}><span class="my-auto py-auto mr-2">Shared</span><i class="bi bi-share-fill fs-4"></i></a>
  @else
  @if( $block === true )
<div class="p-0 m-0 text-center d-inline-block">
  @else
<div class="p-0 m-0 text-center d-inline-block col-md-3">
  @endif
  <a tabindex="0"  data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" {{ $attributes->merge(['class' => 'ppverok btn boton text-center px-auto py-1 my-0 mx-auto d-flex align-items-center justify-content-center']) }}><span class="my-auto py-auto mr-2">Shared</span><i class="bi bi-share-fill"></i></a>
  @endif

  <div id="popover_html" style="display: none;">
    <a href="https://api.whatsapp.com/send?text={{url('/l')}}/{{ Str::substr($evento->slug, -14) }}" target="_blank" id="logo" class="text-center"><i class="bi bi-whatsapp fs-3 fw-bold"></i></a>

    <a href="https://telegram.me/share/url?url={{url('/l')}}/{{ Str::substr($evento->slug, -14) }}&text=We help without excuses, Now its your turn, donate and start helping" target="_blank" class="text-center ml-3 my-1"><i class="bi bi-telegram fs-3 fw-bold"></i></a>

    <!-- <a href="#!" onClick="faceSend()" class="text-center"><i class="bi bi-messenger fs-4 fw-bold"></i></a> -->

    <a href="https://www.facebook.com/sharer/sharer.php?u={{url('/l')}}/{{ Str::substr($evento->slug, -14) }}&amp;src=sdkpreparse" target="_blank" class=" text-center ml-3 my-1"><i class="bi bi-facebook fs-3 fw-bold"></i></a>

    <a href="http://twitter.com/share?url={{url('/l')}}/{{ Str::substr($evento->slug, -14) }}&text=We help without excuses, Now its your turn, donate and start helping" target="_blank" class="text-center ml-3 my-1"><i class="bi bi-twitter fs-3 fw-bold"></i></a>

    <a href="https://plus.google.com/share?url={{url('/l')}}/{{ Str::substr($evento->slug, -14) }}" target="_blank" class="text-center ml-3 my-1"><i class="bi bi-google fs-3 fw-bold"></i></a>

    <a id="nativeShare" class="text-center nativeShare ml-3 my-1"><i class="bi bi-share-fill fs-3 fw-bold"></i></a>
  </div>
  
</div>

@push('js')
<script type="text/javascript">
    let nativeShare = async () => {
      let link = "{{url('/l')}}/{{ Str::substr($evento->slug, -14) }}";
      console.log(link);
       try{

          await navigator.share({ title:"We help without excuses", text:"Now its your turn, donate and start helping", url: link });

       }catch(err){

         try{
            await navigator.canShare({ title:"We help without excuses", text:"Now its your turn, donate and start helping", url: link }); 
         }catch(erro){
            alert('option not valid for this device', erro);
         };

       };
    };
    jQuery(document).ready(function(){
      jQuery('.ppverok').popover({
        html: true,
        delay: 100,
        placement: 'top',
        trigger: 'focus',
        customClass: 'custom-popover text-center',
        content: function () {
            return $('#popover_html').html();
        },
      })
      $('.ppverok').on('shown.bs.popover', function () {
        console.log('se abrio el popover');
        $(".nativeShare i").on('click', function(){
          console.log('desde nativeShare en javascript luego de abrir el popover');
          nativeShare();
        });
      })
    });     
</script>
@endpush