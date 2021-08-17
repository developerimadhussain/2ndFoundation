
<div class="grid_2" style="background:black;">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">

                        <li ><a class="menuitem">NEWS:</a>
                            <ul style= "background;black;" >                         
                                <li><a href="add_news.php?user_id=<?php echo $user_id;?>">Add News</a></li>
								<li><a href="news_list.php?user_id=<?php echo $user_id;?>"> News List</a></li>
                               
                                
                            </ul>
                        </li>
						
                        <li ><a class="menuitem">EVENT:</a>
                            <ul class="submenu">
                                <li><a href="add_event.php?user_id=<?php echo $user_id;?>"> Add Event</a></li>
                                <li><a href="event_list.php?user_id=<?php echo $user_id;?>">Event List</a></li>
                            </ul>
                            </li>
                        <li ><a class="menuitem">CAUSES:</a>
                            <ul class="submenu">
							    <li><a href="add_causes.php?user_id=<?php echo $user_id;?>">Add Causes</a></li>
                                <li><a href="causes_list.php?user_id=<?php echo $user_id;?>">Causes List</a></li>
                               
                            </ul>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
		
		 