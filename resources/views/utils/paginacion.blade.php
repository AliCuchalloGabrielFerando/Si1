    <ul class="pagination">
         <li class="page-item">
            <a class="page-link" href="{{$paginator->previousPageUrl()}}">Ant</a>
         </li>
         @for($i=1;$i<=$paginator->lastPage();$i++)
         <li class="{{$i==$paginator->currentPage() ? 'page-item active' :  'page-item'}}">
             <a class="page-link" href="{{$paginator->url($i)}}">{{$i}}</a>
         </li>
         @endfor
         <li class="page-item">
             <a class="page-link" href="{{$paginator->nextPageUrl()}}">Sig</a>
         </li>
     </ul>