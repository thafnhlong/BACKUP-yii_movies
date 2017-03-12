<div class="most-view block">
   <div class="caption">
      <span class="uppercase">Phim xem nhiều</span>
   </div>
   <div class="tabs">
      <div data-id="d" class="tab active">Ngày</div>
      <div data-id="w" class="tab">Tuần</div>
      <div data-id="m" class="tab">Tháng</div>
   </div>
   <div class="clear"></div>
   <ul class="list-film">
      <?php for($i=4; $i <= 8; $i++){?>
      <li class="film-item-ver">
         <a href="javascript:void(0)" title="">
            <img class="avatar" alt="" src="/images/<?php echo $i?>.jpg"/>
            <div class="title">
               <p class="name">Chubby Cheeks</p>
               <p class="real-name">Nursery Rhymes For Kids And Children</p>
            </div>
         </a>
         
      </li>
      <?php }?>  
   </ul>
</div>