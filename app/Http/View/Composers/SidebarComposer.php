<?php 
namespace App\Http\View\Composers;

use App\Team;
use Illuminate\View\View;

class SidebarComposer 
{  
    /**
     * Team repository implementaiotn
     *
     * @var Team
     */
    protected $teams;

    /**
     * Create a new Sidebar Composer
     * 
     * @return void
     */
    public function __construct()
    {
        $this->teams = auth()->user()->assignedTeams();
    }

    /**
     * Bind data to the view
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('teams', $this->teams);
    }
}
