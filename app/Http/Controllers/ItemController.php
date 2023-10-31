<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Inertia\Inertia; 
use App\Models\Item;

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index() 
    {
        $items = $this->itemService->getAllItems();
        
        return Inertia::render('Items/Index', [
            'items' => $items,
        ]); 
    }

    public function create()
    {
        return Inertia::render('Items/Create');
    }

    public function store(StoreItemRequest $request)
    {
        $this->itemService->storeItem([
            'name'  => $request->name,
            'memo'  => $request->memo,
            'price' => $request->price,
        ]);

        return to_route('items.index')->with([
            'message' => '登録しました。',
            'status'  => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = $this->itemService->getFindItems($id);

        return Inertia::render('Items/Show', [
            'item' => $item,
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return Inertia::render('Items/Edit', [
            'item' => $item,
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->name = $request->name; 
        $item->memo = $request->memo; 
        $item->price = $request->price; 
        $item->is_selling = $request->is_selling; 
        $item->save(); 
        return to_route('items.index') 
        ->with([ 
        'message' => '更新しました。', 
        'status' => 'success' 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
