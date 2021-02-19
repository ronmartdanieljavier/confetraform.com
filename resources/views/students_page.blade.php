@extends('layouts.app')

@section('content')


                        <!-- All students -->
                        <div class="card mb-4">
                            <div class="card-header">List of Students <button class="btn btn-sm btn-primary" type="button">Order by Date</button></div>
                            <div class="card-body p-0">
                                <!-- All students table-->
                                <div class="table-responsive table-billing-history">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Surname</th>
                                                <th scope="col">Last Activity</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr><td>Ivey</td><td>Colgan</td><td>15/06/2020</td><td><span class="badge badge-light">Inactive</span></td></tr>
                                            <tr><td>Graig</td><td>Nailor</td><td>15/05/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Simon</td><td>Gaertner</td><td>17/07/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Valda</td><td>Brun</td><td>19/09/2019</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Ena</td><td>Keyes</td><td>08/08/2019</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Barbie</td><td>Melby</td><td>07/10/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Mohammed</td><td>Tabares</td><td>04/15/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Mui</td><td>Decker</td><td>13/07/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Doris</td><td>Morejon</td><td>23/12/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Brain</td><td>Camilleri</td><td>09/03/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Magaly</td><td>Schwartzkopf</td><td>01/02/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Linnea</td><td>Ahlquist</td><td>05/02/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Leota</td><td>Arcand</td><td>01/08/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Lorraine</td><td>Kocian</td><td>09/01/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Georgann</td><td>Speth</td><td>28/12/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Theda</td><td>Stringfield</td><td>24/10/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Reva</td><td>Marek</td><td>03/15/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Myrtle</td><td>Grubbs</td><td>21/02/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Ellis</td><td>Lozada</td><td>30/04/2020</td><td><span class="badge badge-success">Active</span></td></tr>
                                            <tr><td>Anika</td><td>Langham</td><td>29/07/2019</td><td><span class="badge badge-success">Active</span></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

@endsection
