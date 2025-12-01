<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\TicketType;

class TicketTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $admin): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $admin, TicketType $ticketType): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $admin): bool
    {
        return $admin->isSuperAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $admin, TicketType $ticketType): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin, TicketType $ticketType): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin, TicketType $ticketType): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin, TicketType $ticketType): bool
    {
        return false;
    }
}
