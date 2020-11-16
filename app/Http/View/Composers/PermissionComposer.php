<?php 
namespace App\Http\View\Composers;

use App\Ability;
use App\Team;
use Illuminate\View\View;

class SidebarComposer 
{  
    /**
     * Team repository implementaiotn
     *
     * @var Team
     */
    protected $permissions;

    /**
     * Create a new Sidebar Composer
     * 
     * @return void
     */
    public function __construct()
    {
        $this->permissions = Ability::all();
    }

    /**
     * Bind data to the view
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('permissions', $this->permissions);
    }
}
