<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->integer('category_id')              // category_id
                ->after('category')                     // categoryの後ろに追加
                ->unsigned()                            // 正負の符号無し属性
                ->default(1);                           // 空で外部キーを設定出来ないのでデフォルトを設定
            $table->foreign('category_id')              // category_idを外部キーに設定
                ->references('id')->on('categories')    // categoriesテーブルのidカラムを外部キーにする
                ->onDelete('restrict');                 // 参照先を削除する
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropForeign('restaurants_category_id_foreign'); //外部キー制約の削除
            $table->dropColumn('category_id');                      //カラム削除
        });
    }
}
