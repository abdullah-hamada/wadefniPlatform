<style>
    footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
    }
</style>

<!-- Footer opened -->
<footer class="bg-white p-4">
   <div class="row">
       <div class="col-md-12">
           <div class="fixedtext-center text-md-center">
               <p class="mb-0"> &copy; {{trans('main_trans.Copyright')}} <span id="copyright">
                       <script>
                           document.getElementById('copyright').appendChild(document
                               .createTextNode(new Date().getFullYear()))
                       </script>
                   </span>. <a href="#"> </a>{{trans('main_trans.Name_Programer')}}</p>
           </div>
       </div>
   </div>
</footer>
<!-- Footer closed -->