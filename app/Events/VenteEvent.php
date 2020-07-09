<?php

namespace App\Events;

use App\Vente;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class VenteEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    //public $message;
    public $vente;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Vente $vente)
    {
        //$this->message = $message;
        $this->vente = $vente;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new /*Private*/Channel('channel-vente');
    }

   /* public function broadcastAs()
    {
        return 'vente';
    }*/

    public function broadcastWith()
    {
        return [
            'id' => $this->vente->id,
            'poids'=>$this->vente->poids,
            'montant' => $this->vente->montant,
            'date' => $this->vente->created_at->format('d-m-Y H:i:s'),
            'pisteur' => $this->vente->pisteur->nom.' '.$this->vente->pisteur->prenom,
            'producteur' => $this->vente->producteur->nom.' '.$this->vente->producteur->prenom,
            'cooperative' => $this->vente->producteur->cooperative->libelle,
            'produit' => $this->vente->produit->libelle
        ];
    }
}
