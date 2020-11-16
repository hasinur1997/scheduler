<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\User;
use App\Mail\InviteUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class InviteController extends Controller
{   
    /**
     * User invitation form
     *
     * @return void
     */
    public function create()
    {
        return view('invite.create');
    }

    /**
     * Invite users to the team
     *
     * @param Request $request
     * @param Team $team
     * @return void
     */
    public function invite(Request $request, Team $team)
    {
        $this->validate($request, [
            'email' =>  'required|email'
        ]);
        
        $user = User::where('email', $request->email)->first();

        if ($team->id !== active_team()->id) {
            return redirect()
                    ->back()
                    ->with([
                        'message' => 'You are not allowed to invite user for this team.',
                        'type'    => 'warning',
                    ]);
        }

        if ( $team->users->contains($user) ) {
            return redirect()
                    ->back()
                    ->with([
                        'message' => 'This user is already in this team',
                        'type'    => 'warning',
                    ]);
        }
        

        $data = [
            'accept'    =>  make_url([
                            'team', 
                            active_team()->id, 
                            'invite', Hash:: make($request->email),
                            $request->email
                        ]),
            'decliend' => url('/team/decliend'),
            'team'     => active_team()->name,
        ];

        Mail::to($request->email)->send(new InviteUser($data));

        return redirect()
                ->back()
                ->with([
                    'message' => 'Invitation has been sent successfully !',
                    'type'    => 'success'
                ]);
    }

    /**
     * Accepts invitation of team
     *
     * @param Team $team
     * @param string $email
     * @return void
     */
    public function accept(Team $team, $token, $email)
    {
        $user = User::where('email', $email)->first();

        // If user already exists switch user to the team 
        if ($user) {
            $user->teams()->attach($team->id);
            $user->switchTo($team);

            return redirect('/home');
        }

        // If not exists the user redirect to register page
        return redirect()
                ->route('register')
                ->with([
                    'team'  => $team,
                    'email' => $email,
                    'token' => $token
                ]);
    }

    public function decliend()
    {
        return redirect('/home');
    }
}
