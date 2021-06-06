<x-app-layout>
    <x-slot name="header">
        @include('student.partials.menu-pagos')
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-4 text-2xl">
                       <b>Mis Pagos</b>
                    </div>
                </div>
                <div class="p-6">
                <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                            <tr>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Curso
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Concepto
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha de pago
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Monto pagado
                              </th>
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($pagos as $pago)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                        	{{ $pago->obligacione->matricula->grupo->curso->nombre }}
                                        </div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                        	{{ $pago->obligacione->concepto }}
                                        </div>
                                      </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                      <div class="ml-4">
                                        <div class="text-2xl font-medium text-gray-900">
                                        </div>
                                        <div class="text-sm text-gray-500">
                                          {{ date('d/m/Y', strtotime($pago->fechapago)) }}                                
                                        </div>
                                      </div>
                                    </div>
                                </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ 'S/ '. number_format($pago->monto, 2) }}
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    </span>
                                  </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

            </div>

            </div>
        </div>
    </div>
</x-app-layout>
