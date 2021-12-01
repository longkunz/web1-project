<?php
//Test update setting valid input
public function test_settingValid()
{
    $setting = new Setting();
    $data['description'] = "Description";
    $data['title'] = "Title";
    $data['logo'] = "logo";
    $data['address'] = "address";
    $data['phone'] = "phone";
    $data['email'] = "email";
    DB::beginTransaction();
    $stored = $setting->where("id", "1")->first();
    $status = $stored->fill($data)->save();
    $actual = $setting->where("id", "1")->first();
    $this->assertEquals("Title", $actual->title);
    DB::rollBack();


    try {
        $stored = $setting->where("id", "1")->first();
    $status = $stored->fill($data)->save();
    } catch (Throwable $e) {
        $this->assertTrue(true);
    }
}