@extends('admin::app')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="container">
            <div class="ibox">
                @include('admin::partials.settings-nav')
                <div class="ibox-content settings">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <h2 class="m-b-md">Moderate user can do</h2>
                            <form class="m-b-lg" role="form" method="post" action="{{ route('admin.settings.role.store') }}">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <!-- post start -->
                                <div class="row">
                                    <div class="col-md-3 border-bottom m-b">
                                        <div class="form-group">
                                            <label for="post_page_access">
                                                Post Page access <input id="post_page_access" type="checkbox" name="post_page_access" value="1" <?php if( setting('post_page_access') ){ echo " checked";} ?> >
                                        </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 border-bottom m-b">
                                        <div class="form-group">
                                            <label for="post_page_edit">
                                                Post Edit <input id="post_page_edit" type="checkbox" name="post_page_edit" value="1" <?php if( setting('post_page_edit') ){ echo " checked";} ?> >
                                        </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 border-bottom m-b">
                                        <div class="form-group">
                                            <label for="post_page_delete">
                                                Post Delete <input id="post_page_delete" type="checkbox" name="post_page_delete" value="1" <?php if( setting('post_page_delete') ){ echo " checked";} ?> >
                                        </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 border-bottom m-b">
                                        <div class="form-group">
                                            <label for="post_page_pin">
                                                Post Pin <input id="post_page_pin" type="checkbox" name="post_page_pin" value="1" <?php if( setting('post_page_pin') ){ echo " checked";} ?> >
                                        </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- post end -->

                                <!-- user start -->
                                <div class="row">
                                    <div class="col-md-3 border-bottom m-b">
                                        <div class="form-group">
                                            <label for="user_page_access">
                                                User Page access <input id="user_page_access" type="checkbox" name="user_page_access" value="1" <?php if( setting('user_page_access') ){ echo " checked";} ?> >
                                        </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 border-bottom m-b">
                                        <div class="form-group">
                                            <label for="user_page_edit">
                                                User Edit <input id="user_page_edit" type="checkbox" name="user_page_edit" value="1" <?php if( setting('user_page_edit') ){ echo " checked";} ?> >
                                        </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 border-bottom m-b">
                                        <div class="form-group">
                                            <label for="user_page_delete">
                                                User Delete <input id="user_page_delete" type="checkbox" name="user_page_delete" value="1" <?php if( setting('user_page_delete') ){ echo " checked";} ?> >
                                        </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 border-bottom m-b">
                                        <div class="form-group">
                                            <label for="user_page_pin">
                                                User Ban <input id="user_page_ban" type="checkbox" name="user_page_ban" value="1" <?php if( setting('user_page_ban') ){ echo " checked";} ?> >
                                        </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- user end -->

                                <!-- report start -->
                                <div class="row">
                                    <div class="col-md-3 border-bottom m-b">
                                        <div class="form-group">
                                            <label for="report_page_access">
                                                Report Page access <input id="report_page_access" type="checkbox" name="report_page_access" value="1" <?php if( setting('report_page_access') ){ echo " checked";} ?> >
                                        </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 border-bottom m-b">
                                        <div class="form-group">
                                            <label for="report_page_close">
                                                Report Edit <input id="report_page_close" type="checkbox" name="report_page_close" value="1" <?php if( setting('report_page_close') ){ echo " checked";} ?> >
                                        </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 border-bottom m-b">
                                        <div class="form-group">
                                            <label for="report_page_delete">
                                                Report Delete <input id="report_page_delete" type="checkbox" name="report_page_delete" value="1" <?php if( setting('report_page_delete') ){ echo " checked";} ?> >
                                        </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- report end -->

                                <br>
                                <button class="btn btn-normal">Save</button>
                            </form>

                        </div> 
                    </div> <!-- end of lvl-up -->
                </div> <!-- end of row -->
            </div> <!-- end of ibox-content -->
        </div> <!-- end of ibox -->
    </div> <!-- end of container -->
</div> <!-- end of wrapper wrapper-content -->
@stop