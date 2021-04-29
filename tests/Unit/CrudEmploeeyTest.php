<?php

namespace Tests\Unit;

use App\Company;
use App\Employee;
use App\User;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;



class CrudEmploeeyTest extends TestCase
{
    // use DatabaseTransactions;
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testUserCanSeeEmployeeList()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get("/employees");
        $response->assertStatus(200);
    }

    public function testUserCanSeeCreateEmployeeForm()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get("/employees/create");
        $response->assertStatus(200);
    }

    public function testUserCanSeeEmployee() 
    {
            $user = factory(User::class)->create();
            $this->actingAs($user);
            $employee = factory(Employee::class)->create();
            $response = $this->get("/employees/" . $employee->id);
            $response->assertSee($employee->firstName)
                ->assertSee($employee->lastName);
    }
    
    public function testUserCanAddEmployee()
    {
        $user = factory(User::class)->create();
        $company = factory(Company::class)->create();
        $employee = factory(Employee::class)->make();
        $employee->company_id = $company->id;
        $this->actingAs($user);
        $this->post('/employees', $employee->toArray());
        $this->assertEquals(1, Employee::all()->count());
    }

    public function testUserCanUpdateEmployee()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $company = factory(Company::class)->create();
        $employee = factory(Employee::class)->create();
        $employee->company_id = $company->id;
        $employee->firstName = "afterUpdateFirstName";
        $this->put("/employees/$employee->id", $employee->toArray());
        $employeeAfterUpdate = Employee::find($employee->id);
        $this->assertEquals('afterUpdateFirstName', $employeeAfterUpdate->firstName);
    }

    public function testUserCanDeleteEmployee()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $employee = factory(Employee::class)->create();
        $this->delete("/employees/$employee->id");
        $employeeAfterDelete = Employee::find($employee->id);
        $this->assertEquals(null, $employeeAfterDelete);
    }

}
