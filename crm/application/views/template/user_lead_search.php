<style type="text/css">
    #search-bar .col-md-1 , #search-bar .col-md-2{
        padding-right: 1px;
        padding-left: 1px;
    }
</style>
<form action="<?php echo base_url("Users/loadSearchRecord"); ?>" method="POST">
<div class="alert alert-success row" style="font-size:14px;border: none;padding: 5px;" id="search-bar">
            <div class="col-md-12 my-2" style="font-weight: bold; font-size: 1.2rem">
                Search what you want
            </div>
            <div class="col-md-1 col-6">
                <input type="text" name="Lead_id" class="form-control" placeholder="ID">
            </div>
            <div class="col-md-2 col-6">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="col-md-2 col-6">
                <input type="text" name="phone" class="form-control" placeholder="Phone">
            </div>
            <div class="col-md-2 col-6">
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="col-md-2 col-6">
                <input type="date" name="date" class="form-control" placeholder="Date">
            </div>
            <div class="col-md-1 col-3">
                <div class="form-check">
                    <label class="form-check-label" style="font-size: 0.8rem; font-weight: bold;">
                        <input type="radio" class="form-check-input" name="Priority" value="high" checked>HighToLow
                    </label>
                </div>
                <div class="form-check" >
                    <label class="form-check-label" style="font-size: 0.8rem; font-weight: bold;">
                        <input type="radio" class="form-check-input" name="Priority" value="low">LowToHigh
                    </label>
                </div>
            </div>
            <div class="col-md-1 text-center">
                <label for="dubai_pool" style="font-size: 0.8rem; font-weight: bold;margin-bottom: 0">Dubai Pool</label>
                <input type="checkbox" id="dubai_pool" name="dubai_pool" value="Yes">
            </div>
            <div class="col-md-1">
                <button type="submit"  value="submit_search_form" name='submit' class="btn btn-success btn-block" style="background-color:green;">Search</button>
            </div>
        </div>
    </form>