<style type="text/css">
    .search-bar {
        background-color: white; height: 45px; border-radius: 25px;
    }
    .search-bar .form-group {
        width: 100%; padding: 0 3px 0 20px;
    }
</style>
<form class="search-bar form-inline nopadding">
    <div class="form-group">
        <div class="col-xs-12 pull-left nopadding">
            <div style="padding-right: 60px;">
                <input placeholder="Search Popular Topics" class="form-control" type="text"
                       style="height: 4.4rem; width:100%;" />
            </div>
        </div>
        <div style="position: relative; height:52px; max-width: 50px; float: right; z-index:1;">
            <div style="position: relative; height:52px; z-index:0;">
                <a href="{{ route('topics') }}" class="btn btn-fab btn-fab-mini"
                   style="margin-right: 0; position: relative; top:-52px;">
                    <i class="material-icons" style="font-size: 25px; padding-top: 3px;">search</i>
                </a>
            </div>
        </div>
    </div>
</form>