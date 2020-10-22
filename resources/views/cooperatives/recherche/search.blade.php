<form action="{{route('cooperatives.search')}}" class="d-flex mr-3">
            <br><br>
             <div class="input-group custom-search-form navbar-right col-lg-2">
                   <input type="text" class="search_btn" name="q" placeholder="Search..." value="{{ request()->q ?? '' }}">
                   <span class="input-group-btn  ">
                        <button class="btn bg-teal search_btn" type="submit">
                            <em class="fa fa-search"> </em>
                        </button>
                   </span>
            </div>
            <br><br>
       </form>  
