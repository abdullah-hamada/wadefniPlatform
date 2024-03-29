<!-- delete_modal_Job -->
<div class="modal fade" id="delete{{ $job->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="exampleModalLabel">
                    {{ trans('jobs_trans.delete_job') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                    {{ method_field('Delete') }}
                    @csrf
                    {{ trans('jobs_trans.Warning_job') }}
                    <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $job->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('jobs_trans.Close') }}</button>
                        <button type="submit"
                            class="btn btn-danger">{{ trans('jobs_trans.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>