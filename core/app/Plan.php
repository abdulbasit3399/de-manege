<?php

namespace App;

use App\PlanPriceHistory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = ['id'];

    protected $table = "plans";

    public function latest_plan_price()
    {
        return PlanPriceHistory::where('plan_id',$this->id)->orderBy('id','DESC')->first();
    }
}
