{{-- <!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('Students_trans.Deleted_Student')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Students.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="id" value="{{$student->id}}">

                    <h5 style="font-family: 'Cairo', sans-serif;">{{trans('Students_trans.Deleted_Student_tilte')}}</h5>
                    <input type="text" readonly value="{{$student->name}}" class="form-control">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('Students_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
<!-- delete_modal_User -->
                            <div class="modal fade" id="delete{{ $User->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('Users_trans.delete_User') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('Users.destroy', $User->id) }}" method="POST">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('Users_trans.Warning_User') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $User->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Users_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('Users_trans.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>