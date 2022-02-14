<?php

namespace App\Http\Middleware;

use Closure;

class Authorization

{

    /**

     * Handle an incoming request.

     *

     * @param  \Illuminate\Http\Request $request

     * @param  \Closure $next

     * @return mixed

     */

    public function handle($request, Closure $next)

    {

        $access_allowed = true;

        $controller = class_basename(\Route::current()->controller);

        // handle the logged in admin privileges

        switch ($controller) {

            case "AdminUserController":

                $access_allowed = check_privilege('admin_users');

                break;

            case "CustomerController":

                $access_allowed = check_privilege('customers');

                break;

            case "CategoryController":

                $access_allowed = check_privilege('categories');

                break;

            case "BrandController":

                $access_allowed = check_privilege('brands');

                break;

            case "ProductController":

                $access_allowed = check_privilege('products');

                break;

            case "OptionController":

                $access_allowed = check_privilege('options');

                break;

            case "CollectionController":

                $access_allowed = check_privilege('collections');

                break;

            case "DiscountController":

                $access_allowed = check_privilege('discounts');

                break;

            case "AttributeController":

                $access_allowed = check_privilege('attributes');

                break;

            case "EnquiryController":

                $access_allowed = check_privilege('enquiries');

                break;

            case "NotificationController":

                $access_allowed = check_privilege('push_notifications');

                break;

            case "SliderLogoController":

                $access_allowed = check_privilege('sliders_logo');

                break;

            case "EmailTemplateController":

                $access_allowed = check_privilege('email_templates');

                break;

            case "SettingsController":

                $access_allowed = check_privilege('general_settings');

                break;

            case "UserGroupController":

                $access_allowed = check_privilege('user_groups');

                break;

            case "NewsAlertController":

            $access_allowed = check_privilege('news_alert');

            break;



             case "QuestionOfTheDayController":

            $access_allowed = check_privilege('question_of_day');

            break;


            case "ReportController":

            $access_allowed = check_privilege('course_report');
            $access_allowed = check_privilege('package_report');
            $access_allowed = check_privilege('sales_report');

            break;





        }

        if (!$access_allowed)

            return redirect(\Config::get('app.app_route_prefix') . '/not_authorized');

        return $next($request);

    }

}

