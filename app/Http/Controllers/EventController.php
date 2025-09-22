<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'capacity' => 'required|integer',
            'sold' => 'nullable|integer',
        ]);

        $event = Event::create($validated);

        return response()->json($event, 201);
    }

    
    public function show(string $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Evento no encontrado'], 404);
        }

        return response()->json($event);
    }

    
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Evento no encontrado'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'sometimes|required|date',
            'capacity' => 'sometimes|required|integer',
            'sold' => 'nullable|integer',
        ]);

        $event->update($validated);

        return response()->json($event);
    }

    
    public function destroy(string $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Evento no encontrado'], 404);
        }

        $event->delete();

        return response()->json(['message' => 'Evento eliminado']);
    }
}
