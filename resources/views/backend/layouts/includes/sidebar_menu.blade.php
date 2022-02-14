<br>
<?php
$controller = class_basename(\Route::current()->controller);
$action = class_basename(\Route::current()->action['uses']);
$url_prefix = Config::get('app.app_route_prefix');
//dd($action);
?>
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu kt-scroll ps ps--active-y" data-ktmenu-vertical="1"
         data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500" style="height: 302px; overflow: hidden;">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item {{ ($controller == "DashboardController") ? 'kt-menu__item--active' : ''}}"
                aria-haspopup="true">
                <a href="{{ url($url_prefix . '/dashboard') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon fa fa-home"></span>
                    <span class="kt-menu__link-text">Dashboard</span>
                </a>
            </li>
            @if(check_privilege('admin_users') || check_privilege('customers'))
                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">Manage Users</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu {{ ($controller == "AdminUserController" || $controller == "CustomerController") ? ' kt-menu__item--open  kt-menu__item--active' : ''}}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon fa fa-user-friends"></span>
                        <span class="kt-menu__link-text">Users</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link"><span class="kt-menu__link-text">Users</span></span></li>
                            @if(check_privilege('admin_users'))
                                <li class="kt-menu__item {{ ($controller == "AdminUserController") ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/admin_users') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Admin Users</span>
                                    </a>
                                </li>
                            @endif
                            @if(check_privilege('customers'))
                                <li class="kt-menu__item {{ ($controller == "CustomerController" && ($action=="CustomerController@pending" || $action=="CustomerController@unauthorized_view" )) ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/customer/pending') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Pending Users</span>
                                    </a>
                                </li>

                                <li class="kt-menu__item {{ ($controller == "CustomerController" && ($action =="CustomerController@index" )) ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/customers') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Verified Users</span>
                                    </a>
                                </li>

                                <li class="kt-menu__item {{ ($controller == "CustomerController" && ($action=="CustomerController@rejected" )) ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/customer/rejected') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Rejected Users</span>
                                    </a>
                                </li>





                            <!-- <li class="kt-menu__item {{ ($controller == "CustomerController" && ($action=="CustomerController@unauthorized" || $action=="CustomerController@unauthorized_view" )) ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/customer/unauthorized') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Unauthorized Users</span>
                                    </a>
                                </li> -->
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            @if(check_privilege('categories') || check_privilege('brands') || check_privilege('products') || check_privilege('options') || check_privilege('collections') || check_privilege('discounts') || check_privilege('attributes'))
                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">Manage Courses</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu {{ (($controller == "CourseManageController") || ($controller == "PackageController") || ($controller == "CourseLecturerController")) ? 'kt-menu__item--open kt-menu__item--here' : ''}}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon fa fa-shopping-cart"></span>
                        <span class="kt-menu__link-text">Courses</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Courses</span></span>
                            </li>
                            @if(check_privilege('couses'))
                                <li class="kt-menu__item {{ ($controller == "CourseManageController") ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/course_manage') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Courses</span>
                                    </a>
                                </li>
                            @endif
                            @if(check_privilege('package'))
                                <li class="kt-menu__item {{ ($controller == "PackageController") ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/packages') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Packages</span>
                                    </a>
                                </li>
                            @endif
                            @if(check_privilege('lecturer'))
                                <li class="kt-menu__item {{ ($controller == "CourseLecturerController") ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/course_lecturer') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Lecturers</span>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
            @endif

        <!--  <li class="kt-menu__item {{ ($controller == "PaymentsController") ? 'kt-menu__item--active' : ''}}"
                aria-haspopup="true">
                <a href="{{ url($url_prefix . '/admin_payments') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon fa fa-credit-card"></span>
                    <span class="kt-menu__link-text">Subscription</span>
                </a>
            </li> -->


            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">Manage Subscription</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu {{ (($controller == "PaymentsController") ) ? 'kt-menu__item--open kt-menu__item--here' : ''}}"
                aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-icon fa fa-credit-card"></span>
                    <span class="kt-menu__link-text">Subscription</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Subscription</span></span>
                        </li>

                        <li class="kt-menu__item {{ ($controller == "PaymentsController" && ($action=="PaymentsController@index" )) ? 'kt-menu__item--active' : ''}}"
                            aria-haspopup="true">
                            <a href="{{ url($url_prefix . '/admin_payments') }}" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">Initiated</span>
                            </a>
                        </li>


                        <li class="kt-menu__item {{ ($controller == "PaymentsController" && ($action=="PaymentsController@success" )) ? 'kt-menu__item--active' : ''}}"
                            aria-haspopup="true">
                            <a href="{{ url($url_prefix . '/admin_payment/success') }}" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">Success</span>
                            </a>
                        </li>

                        <li class="kt-menu__item {{ ($controller == "PaymentsController" && ($action=="PaymentsController@pending" )) ? 'kt-menu__item--active' : ''}}"
                            aria-haspopup="true">
                            <a href="{{ url($url_prefix . '/admin_payment/pending') }}" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">Pending</span>
                            </a>
                        </li>

                        <li class="kt-menu__item {{ ($controller == "PaymentsController" && ($action=="PaymentsController@failed" )) ? 'kt-menu__item--active' : ''}}"
                            aria-haspopup="true">
                            <a href="{{ url($url_prefix . '/admin_payment/failed') }}" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">Failed</span>
                            </a>
                        </li>

                        <li class="kt-menu__item {{ ($controller == "PaymentsController" && ($action=="PaymentsController@cancel" )) ? 'kt-menu__item--active' : ''}}"
                            aria-haspopup="true">
                            <a href="{{ url($url_prefix . '/admin_payment/cancel') }}" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">Cancelled</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>


            @if(check_privilege('categories') || check_privilege('brands') || check_privilege('products') || check_privilege('options') || check_privilege('collections') || check_privilege('discounts') || check_privilege('attributes') || check_privilege('forum_posts') || check_privilege('topics') )
                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">Manage Forum</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu {{ (($controller == "TopicController") || ($controller == "ForumPostController")) ? 'kt-menu__item--open kt-menu__item--here' : ''}}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon fa fa-balance-scale"></span>
                        <span class="kt-menu__link-text">Forum</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Topics</span></span>
                            </li>
                            @if(check_privilege('topics'))
                                <li class="kt-menu__item {{ ($controller == "TopicController") ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/topics') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Topics</span>
                                    </a>
                                </li>
                            @endif
                            @if(check_privilege('forum_posts'))
                                <li class="kt-menu__item {{ ($controller == "ForumPostController") ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/forum_posts') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Posts</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            @if(check_privilege('enquiries') || check_privilege('push_notifications'))
            <!-- <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">Manage Communication</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu {{ (($controller == "EnquiryController") || ($controller == "NotificationController") || ($controller == "NewsletterSubscriberController")) ? 'kt-menu__item--open kt-menu__item--here' : ''}}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon fa fa-envelope-open-text"></span>
                        <span class="kt-menu__link-text">Communication</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Communication</span></span>
                            </li>
                            @if(check_privilege('enquiries'))
                <li class="kt-menu__item {{ ($controller == "EnquiryController") ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/enquiries') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Enquiries</span>
                                        <span class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill kt-badge--rounded stats-badge-magenta"
                                              style="margin-top: 8px;">
                                            <strong>{{ get_open_enquiries_count() }}</strong>
                                        </span>
                                    </a>
                                </li>
                            @endif
                @if(check_privilege('push_notifications'))
                <li class="kt-menu__item {{ ($controller == "NotificationController") ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/push_notifications') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Push Notifications</span>
                                    </a>
                                </li>
                            @endif
                @if(check_privilege('newsletter_subscribers'))
                <li class="kt-menu__item {{ ($controller == "NewsletterSubscriberController") ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/newsletter_subscribers') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Newsletter Subscribers</span>
                                    </a>
                                </li>
                            @endif
                    </ul>
                </div>
            </li> -->
            @endif
            @if(check_privilege('sliders_logo') || check_privilege('email_templates'))
                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">Manage Templates</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu {{ (($controller == "TemplateGeneralController") || ($controller == "TemplateEmailController") || ($controller == "FaqController") || ($controller == "TeamController") || ($controller == "TemplateSlidersController") || ($controller == "AboutusController")) ? 'kt-menu__item--open kt-menu__item--here' : ''}}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon fa fa-edit"></span>
                        <span class="kt-menu__link-text">Templates</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link"><span class="kt-menu__link-text">Templates</span></span>
                            </li>
                            @if(check_privilege('sliders_logo'))
                                <li class="kt-menu__item {{ ($controller == "TemplateGeneralController") ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/site_templates') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Site Templates</span>
                                    </a>
                                </li>
                            @endif
                        <!--  @if(check_privilege('email_templates'))
                            <li class="kt-menu__item {{ ($controller == "TemplateEmailController") ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/email_templates') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Email Templates</span>
                                    </a>
                                </li>
                            @endif -->
                            @if(check_privilege('slider'))
                                <li class="kt-menu__item {{ ($controller == "TemplateSlidersController") ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/template_slider') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Sliders</span>
                                    </a>
                                </li>
                            @endif

                            <li class="kt-menu__item {{ ($controller == "AboutusController") ? 'kt-menu__item--active' : ''}}"
                                aria-haspopup="true">
                                <a href="{{ url($url_prefix . '/aboutus') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">About Us</span>
                                </a>
                            </li>


                            @if(check_privilege('faqs'))
                                <li class="kt-menu__item {{ ($controller == "FaqController") ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/faqs') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">FAQ's</span>
                                    </a>
                                </li>
                            @endif

                            <li class="kt-menu__item {{ ($controller == "TeamController") ? 'kt-menu__item--active' : ''}}"
                                aria-haspopup="true">
                                <a href="{{ url($url_prefix . '/team') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Team</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            @endif





            @if(check_privilege('course_report') || check_privilege('package_report'))
                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">View Reports</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu {{ ($controller == "ReportController") ? 'kt-menu__item--open kt-menu__item--here' : ''}}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon fa fa-chart-bar"></span>
                        <span class="kt-menu__link-text">Reports</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link"><span class="kt-menu__link-text">Reports</span></span>
                            </li>
                            @if(check_privilege('course_report'))
                                <li class="kt-menu__item {{ ($controller == "ReportController" && ($action=="ReportController@attorney_mcle_compliance_report" || $action=="ReportController@attorney_mcle_compliance_filter" )) ? 'kt-menu__item--active' : ''}}"
                                    aria-haspopup="true">
                                    <a href="{{ url($url_prefix . '/report/attorney_mcle_compliance') }}"
                                       class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">Attorney's MCLE Compliance Report</span>
                                    </a>
                                </li>
                            @endif
                            {{--@if(check_privilege('course_report'))--}}
                                {{--<li class="kt-menu__item {{ ($controller == "ReportController" && ($action=="ReportController@education_activity_evaluation_report")) ? 'kt-menu__item--active' : ''}}"--}}
                                    {{--aria-haspopup="true">--}}
                                    {{--<a href="{{ url($url_prefix . '/report/education_activity_evaluation') }}"--}}
                                       {{--class="kt-menu__link ">--}}
                                        {{--<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>--}}
                                        {{--<span class="kt-menu__link-text">Education Activity Evaluation Report</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                            {{--<li class="kt-menu__item {{ ($controller == "ReportController" && ($action=="ReportController@user_order_report" ||  $action=="ReportController@user_order_filter")) ? 'kt-menu__item--active' : ''}}"--}}
                                {{--aria-haspopup="true">--}}
                                {{--<a href="{{ url($url_prefix . '/report/user_order') }}"--}}
                                   {{--class="kt-menu__link ">--}}
                                    {{--<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>--}}
                                    {{--<span class="kt-menu__link-text">User's Order Report</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="kt-menu__item {{ ($controller == "ReportController" && ($action=="ReportController@order_sale_report" ||  $action=="ReportController@order_sale_report_filter")) ? 'kt-menu__item--active' : ''}}"--}}
                                {{--aria-haspopup="true">--}}
                                {{--<a href="{{ url($url_prefix . '/report/order_sale_report') }}"--}}
                                   {{--class="kt-menu__link ">--}}
                                    {{--<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>--}}
                                    {{--<span class="kt-menu__link-text">Order Report </span>--}}
                                {{--</a>--}}
                            {{--</li>--}}

                            <li class="kt-menu__item {{ ($controller == "ReportController" && ($action=="ReportController@summary_report" || $action=="ReportController@summary_report_filter" ) ) ? 'kt-menu__item--active' : ''}}"
                                aria-haspopup="true">
                                <a href="{{ url($url_prefix . '/report/summary_report') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Summary Report</span>
                                </a>
                            </li>
                            <li class="kt-menu__item {{ ($controller == "ReportController" && ($action=="ReportController@comprehensive_report" || $action=="ReportController@comprehensive_report_filter" ) ) ? 'kt-menu__item--active' : ''}}"
                                aria-haspopup="true">
                                <a href="{{ url($url_prefix . '/report/comprehensive_report') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Comprehensive Report</span>
                                </a>
                            </li>
                            {{--<li class="kt-menu__item {{ ($controller == "ReportController" && ($action=="ReportController@customer_report" || $action=="ReportController@report_customer_filter" ) ) ? 'kt-menu__item--active' : ''}}"--}}
                                {{--aria-haspopup="true">--}}
                                {{--<a href="{{ url($url_prefix . '/report/customer_report') }}" class="kt-menu__link ">--}}
                                    {{--<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>--}}
                                    {{--<span class="kt-menu__link-text">User Course Evaluation</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}

                            {{--@if(check_privilege('course_report'))--}}
                                {{--<li class="kt-menu__item {{ ($controller == "ReportController" && ($action=="ReportController@customer_report" || $action=="ReportController@report_customer_filter" ) ) ? 'kt-menu__item--active' : ''}}"--}}
                                    {{--aria-haspopup="true">--}}
                                    {{--<a href="{{ url($url_prefix . '/report/customer_report') }}" class="kt-menu__link ">--}}
                                        {{--<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>--}}
                                        {{--<span class="kt-menu__link-text">User Course Evaluation</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                            {{--@if(check_privilege('course_report'))--}}
                                {{--<li class="kt-menu__item {{ ($controller == "ReportController" && ($action=="ReportController@report_course" || $action=="ReportController@report_course_filter" ) ) ? 'kt-menu__item--active' : ''}}"--}}
                                    {{--aria-haspopup="true">--}}
                                    {{--<a href="{{ url($url_prefix . '/report/report_course') }}" class="kt-menu__link ">--}}
                                        {{--<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>--}}
                                        {{--<span class="kt-menu__link-text">Course Evaluation</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                            {{--@if(check_privilege('package_report'))--}}
                                {{--<li class="kt-menu__item {{ ($controller == "ReportController" && ($action=="ReportController@report_package" ||  $action=="ReportController@report_package_filter")) ? 'kt-menu__item--active' : ''}}"--}}
                                    {{--aria-haspopup="true">--}}
                                    {{--<a href="{{ url($url_prefix . '/report/report_package') }}" class="kt-menu__link ">--}}
                                        {{--<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>--}}
                                        {{--<span class="kt-menu__link-text">Package Evaluation</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                            {{--@if(check_privilege('sales_report'))--}}
                                {{--<li class="kt-menu__item {{ ($controller == "ReportController" && ($action=="ReportController@lecturer" ||  $action=="ReportController@lecturer_filter")) ? 'kt-menu__item--active' : ''}}"--}}
                                         {{--aria-haspopup="true">--}}
                                    {{--<a href="{{ url($url_prefix . '/report/lecturer') }}" class="kt-menu__link ">--}}
                                        {{--<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>--}}
                                        {{--<span class="kt-menu__link-text">Lecturer Evaluation</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--@endif                            --}}
                        </ul>
                    </div>
                </li>
            @endif
            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">Settings</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu {{ (($controller == "SettingsGeneralController") || ($controller == "UserGroupController") || ($controller == "QuestionOfTheDayController") || ($controller == "NewsAlertController")) ? 'kt-menu__item--open kt-menu__item--here' : ''}}"
                aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-icon fa fa-cogs"></span>
                    <span class="kt-menu__link-text">Settings</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                            <span class="kt-menu__link"><span class="kt-menu__link-text">Settings</span></span>
                        </li>
                        @if(check_privilege('general_settings'))
                            <li class="kt-menu__item {{ ($controller == "SettingsGeneralController") ? 'kt-menu__item--active' : ''}}"
                                aria-haspopup="true">
                                <a href="{{ url($url_prefix . '/general_settings') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">General</span>
                                </a>
                            </li>

                        @endif
                        @if(check_privilege('user_groups'))
                            <li class="kt-menu__item {{ ($controller == "UserGroupController") ? 'kt-menu__item--active' : ''}}"
                                aria-haspopup="true">
                                <a href="{{ url($url_prefix . '/user_groups') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">User Group</span>
                                </a>
                            </li>
                        @endif
                        @if(check_privilege('news_alert'))
                            <li class="kt-menu__item {{ ($controller == "NewsAlertController") ? 'kt-menu__item--active' : ''}}"
                                aria-haspopup="true">
                                <a href="{{ url($url_prefix . '/news_alert') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">News Alerts</span>
                                </a>
                            </li>
                        @endif
                        @if(check_privilege('question_of_day'))
                            <li class="kt-menu__item {{ ($controller == "QuestionOfTheDayController") ? 'kt-menu__item--active' : ''}}"
                                aria-haspopup="true">
                                <a href="{{ url($url_prefix . '/question_of_day') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Question of the Day</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </li>


            <li class="kt-menu__item {{ ($controller == "ProfileController") ? 'kt-menu__item--active' : ''}}"
                aria-haspopup="true">
                <a href="{{ url($url_prefix . '/profile') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon fa fa-user-cog"></span>
                    <span class="kt-menu__link-text">Profile</span>
                </a>
            </li>
            <li class="kt-menu__item " aria-haspopup="true">
                <a href="{{ url($url_prefix . '/logout') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon fa fa-sign-out-alt"></span>
                    <span class="kt-menu__link-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>