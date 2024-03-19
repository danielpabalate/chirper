<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use Illuminate\View\View;

class SampleController extends Controller
{
    // viewing of sample page //
    public function index(): View
    {
        return view('sample.sample', [
            'samples' => Sample::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // inputing number and solution in database named samples //
    public function store(Request $request): RedirectResponse
    {
    $validated = $request->validate([
        'number1' => 'required|string|max:9',
        'number2' => 'required|string|max:9',
        'solution' => 'required|string|max:255',
    ]);

    $request->user()->sample()->create($validated);

    return redirect(route('sample.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sample  $chirp
     * @return \Illuminate\Http\Response
     */
    public function show(Sample $sample)
    {
        //
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sample $sample
     * @return \Illuminate\Http\Response
     */

     public function edit(Sample $sample): View
     {
         $this->authorize('update', $sample);
  
         return view('sample.edit', [
             'sample' => $sample,
         ]);
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Sample  $sample
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Sample $sample): RedirectResponse
     {
         $this->authorize('update', $sample);
  
         $validated = $request->validate([
            'number1' => 'required|string|max:3',
            'number2' => 'required|string|max:3',
            'solution' => 'required|string|max:255',
        ]);
    
        $sample->update($validated);
  
         return redirect(route('sample.index'));
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Sample  $sample
      * @return \Illuminate\Http\Response
      */
     public function destroy(Sample $sample): RedirectResponse
     {
         $this->authorize('delete', $sample);
  
         $sample->delete();
  
         return redirect(route('sample.index'));
     }

    public function calculateResult()
    {
        $number1 = $this->number1;
        $number2 = $this->number2;
        $solution = $this->solution;

        // Perform the calculation based on the solution
        switch ($solution) {
            case '+':
                return $number1 + $number2;
            case '-':
                return $number1 - $number2;
            case '*':
                return $number1 * $number2;
            case '/':
                // Make sure to handle division by zero or other relevant cases
                return $number2 !== 0 ? $number1 / $number2 : 'Undefined';
            default:
                return 'Invalid Solution';
        }
    }

}
