<div class="col-md-6">
    <div class="row">
      <div class="col">
        <div class="input-group mb-3">
          <form method="GET" action="{{ route('students.index') }}" id="filterForm">
            <select name="college_id" class="custom-select" onchange="document.getElementById('filterForm').submit();">
              @foreach ($colleges as $id => $name)
                  <option {{ $id == request('college_id') ? 'selected' : ''}} value="{{ $id }}">{{ $name }}</option>
              @endforeach
            </select>
          </form>
          </div>
        </div>
      </div>
    </div>
</div>