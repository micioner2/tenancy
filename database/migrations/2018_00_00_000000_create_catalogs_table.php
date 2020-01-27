<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_types', function (Blueprint $table) {
            $table->char('id', 3)->index();
            $table->string('description');
            $table->string('symbol');
            $table->boolean('active');
        });

        DB::table('currency_types')->insert([
            ['id' => 'PEN', 'description' => 'Soles',               'symbol' => 'S/', 'active' => true],
            ['id' => 'USD', 'description' => 'Dólares Americanos',  'symbol' => '$',  'active' => true],
            ['id' => 'EUR', 'description' => 'Euros',               'symbol' => '€',  'active' => false],
        ]);

        Schema::create('price_types', function (Blueprint $table) {
            $table->char('id', 2)->index();
            $table->string('description');
            $table->boolean('active');
        });

        DB::table('price_types')->insert([
            ['id' => '01', 'description' => 'Precio unitario (incluye el IGV)',                      'active' =>true],
            ['id' => '02', 'description' => 'Valor referencial unitario en operaciones no onerosas', 'active' =>true],
        ]);

        Schema::create('affectation_igv_types', function (Blueprint $table) {
            $table->char('id', 2)->index();
            $table->string('description');
            $table->boolean('active');
            $table->boolean('free');
        });

        DB::table('affectation_igv_types')->insert([
            ['id' => '10', 'description' => 'Gravado - Operación Onerosa',                  'free' => false, 'active' => true],
            ['id' => '11', 'description' => 'Gravado – Retiro por premio',                  'free' => true,  'active' => true],
            ['id' => '12', 'description' => 'Gravado – Retiro por donación',                'free' => true,  'active' => true],
            ['id' => '13', 'description' => 'Gravado – Retiro',                             'free' => true,  'active' => true],
            ['id' => '14', 'description' => 'Gravado – Retiro por publicidad',              'free' => true,  'active' => true],
            ['id' => '15', 'description' => 'Gravado – Bonificaciones',                     'free' => true,  'active' => true],
            ['id' => '16', 'description' => 'Gravado – Retiro por entrega a trabajadores',  'free' => true,  'active' => true],
            ['id' => '17', 'description' => 'Gravado – IVAP',                               'free' => true,  'active' => false],
            ['id' => '20', 'description' => 'Exonerado - Operación Onerosa',                'free' => false, 'active' => true],
            ['id' => '21', 'description' => 'Exonerado – Transferencia Gratuita',           'free' => true,  'active' => true],
            ['id' => '30', 'description' => 'Inafecto - Operación Onerosa',                 'free' => false, 'active' => true],
            ['id' => '31', 'description' => 'Inafecto – Retiro por Bonificación',           'free' => true,  'active' => true],
            ['id' => '32', 'description' => 'Inafecto – Retiro',                            'free' => true,  'active' => true],
            ['id' => '33', 'description' => 'Inafecto – Retiro por Muestras Médicas',       'free' => true,  'active' => true],
            ['id' => '34', 'description' => 'Inafecto - Retiro por Convenio Colectivo',     'free' => true,  'active' => true],
            ['id' => '35', 'description' => 'Inafecto – Retiro por premio',                 'free' => true,  'active' => true],
            ['id' => '36', 'description' => 'Inafecto - Retiro por publicidad',             'free' => true,  'active' => true],
            ['id' => '40', 'description' => 'Exportación de bienes o servicios',            'free' => false, 'active' => true],
        ]);

        Schema::create('system_isc_types', function (Blueprint $table) {
            $table->char('id', 2)->index();
            $table->string('description');
            $table->boolean('active');
        });

        DB::table('system_isc_types')->insert([
            ['id' => '01', 'description' => 'Sistema al valor',                         'active' =>true],
            ['id' => '02', 'description' => 'Aplicación del Monto Fijo',                'active' =>true],
            ['id' => '03', 'description' => 'Sistema de Precios de Venta al Público',   'active' =>true],
        ]);

        Schema::create('document_types', function (Blueprint $table) {
            $table->char('id', 2)->index();
            $table->string('description');
            $table->string('short')->nullable();
            $table->boolean('active');
        });

        DB::table('document_types')->insert([
            ['id' => '01', 'description' => 'FACTURA ELECTRÓNICA',                                          'short' => 'FT', 'active' => true],
            ['id' => '03', 'description' => 'BOLETA DE VENTA ELECTRÓNICA',                                  'short' => 'BV', 'active' => true],
            ['id' => '06', 'description' => 'Carta de porte aéreo',                                         'short' => null, 'active' => false],
            ['id' => '07', 'description' => 'NOTA DE CRÉDITO',                                              'short' => 'NC', 'active' => true],
            ['id' => '08', 'description' => 'NOTA DE DÉBITO',                                               'short' => 'ND', 'active' => true],
            ['id' => '09', 'description' => 'Guia de remisión remitente',                                   'short' => null, 'active' => false],
            ['id' => '12', 'description' => 'Ticket de maquina registradora',                               'short' => null, 'active' => false],
            ['id' => '13', 'description' => 'Documento emitido por bancos, instituciones financieras, 
                                             crediticias y de seguros que se encuentren bajo el control 
                                             de la superintendencia de banca y seguros',                    'short' => null, 'active' => false],
            ['id' => '14', 'description' => 'Recibo de servicios públicos',                                 'short' => null, 'active' => false],
            ['id' => '15', 'description' => 'Boletos emitidos por el servicio de transporte terrestre
                                             regular urbano de pasajeros y el ferroviario público de
                                             pasajeros prestado en vía férrea local.',                      'short' => null, 'active' => false],
            ['id' => '16', 'description' => 'Boleto de viaje emitido por las empresas de transporte
                                             público interprovincial de pasajeros',                         'short' => null, 'active' => false],
            ['id' => '18', 'description' => 'Documentos emitidos por las afp',                              'short' => null, 'active' => false],
            ['id' => '20', 'description' => 'Comprobante de retencion',                                     'short' => null, 'active' => false],
            ['id' => '21', 'description' => 'Conocimiento de embarque por el servicio de transporte de
                                             carga marítima',                                               'short' => null, 'active' => false],
            ['id' => '24', 'description' => 'Certificado de pago de regalías emitidas por perupetro s.a.',  'short' => null, 'active' => false],
            ['id' => '31', 'description' => 'Guía de remisión transportista',                               'short' => null, 'active' => false],
            ['id' => '37', 'description' => 'Documentos que emitan los concesionarios del servicio de
                                             revisiones técnicas',                                          'short' => null, 'active' => false],
            ['id' => '40', 'description' => 'Comprobante de percepción',                                    'short' => null, 'active' => false],
            ['id' => '41', 'description' => 'Comprobante de percepción – venta interna
                                             (físico - formato impreso)',                                   'short' => null, 'active' => false],
            ['id' => '43', 'description' => 'Boleto de compañias de aviación transporte aéreo no regular',  'short' => null, 'active' => false],
            ['id' => '45', 'description' => 'Documentos emitidos por centros educativos y culturales, 
                                             universidades, asociaciones y fundaciones.',                   'short' => null, 'active' => false],
            ['id' => '56', 'description' => 'Comprobante de pago seae',                                     'short' => null, 'active' => false],
            ['id' => '71', 'description' => 'Guia de remisión remitente complementaria',                    'short' => null, 'active' => false],
            ['id' => '72', 'description' => 'Guia de remisión transportista complementaria',                'short' => null, 'active' => false],
        ]);

        Schema::create('identity_document_types', function (Blueprint $table) {
            $table->char('id', 1)->index();
            $table->string('description');
            $table->boolean('active');
        });

        DB::table('identity_document_types')->insert([
            ['id' => '0', 'description' => 'Doc.trib.no.dom.sin.ruc',                           'active' =>true],
            ['id' => '1', 'description' => 'DNI',                                               'active' => true],
            ['id' => '4', 'description' => 'CE',                                                'active' => true],
            ['id' => '6', 'description' => 'RUC',                                               'active' => true],
            ['id' => '7', 'description' => 'Pasaporte',                                         'active' => true],
            ['id' => 'A', 'description' => 'Ced. Diplomática de identidad',                     'active' => false],
            ['id' => 'B', 'description' => 'Documento identidad país residencia-no.d',          'active' => false],
            ['id' => 'C', 'description' => 'Tax Identification Number - TIN – Doc Trib PP.NN',  'active' => false],
            ['id' => 'D', 'description' => 'Identification Number - IN – Doc Trib PP. JJ',      'active' => false],
            ['id' => 'E', 'description' => 'TAM- Tarjeta Andina de Migración',                  'active' => false],
        ]);

        Schema::create('unit_types', function (Blueprint $table) {
            $table->string('id', 3)->index();
            $table->string('description');
            $table->string('symbol')->nullable();
            $table->boolean('active');
        });

        DB::table('unit_types')->insert([
            ['id' => 'ZZ',  'description' => 'Servicio',    'symbol' => null, 'active' => true],
            ['id' => 'BX',  'description' => 'Caja',        'symbol' => null, 'active' => true],
            ['id' => 'GLL', 'description' => 'Galones',     'symbol' => null, 'active' => true],
            ['id' => 'GRM', 'description' => 'Gramos',      'symbol' => null, 'active' => true],
            ['id' => 'KGM', 'description' => 'Kilos',       'symbol' => null, 'active' => true],
            ['id' => 'LTR', 'description' => 'Litros',      'symbol' => null, 'active' => true],
            ['id' => 'MTR', 'description' => 'Metros',      'symbol' => null, 'active' => true],
            ['id' => 'FOT', 'description' => 'Pies',        'symbol' => null, 'active' => true],
            ['id' => 'INH', 'description' => 'Pulgadas',    'symbol' => null, 'active' => true],
            ['id' => 'NIU', 'description' => 'Unidades',    'symbol' => null, 'active' => true],
            ['id' => 'YRD', 'description' => 'Yardas',      'symbol' => null, 'active' => true],
            ['id' => 'HUR', 'description' => 'Hora',        'symbol' => null, 'active' => true],
        ]);

        Schema::create('note_credit_types', function (Blueprint $table) {
            $table->string('id', 2)->index();
            $table->string('description');
            $table->boolean('active');
        });

        DB::table('note_credit_types')->insert([
            ['id' => '01', 'description' => 'Anulación de la operación',              'active' =>true],
            ['id' => '02', 'description' => 'Anulación por error en el RUC',          'active' =>true],
            ['id' => '03', 'description' => 'Corrección por error en la descripción', 'active' =>true],
            ['id' => '04', 'description' => 'Descuento global',                       'active' =>true],
            ['id' => '05', 'description' => 'Descuento por ítem',                     'active' =>true],
            ['id' => '06', 'description' => 'Devolución total',                       'active' =>true],
            ['id' => '07', 'description' => 'Devolución por ítem',                    'active' =>true],
            ['id' => '08', 'description' => 'Bonificación',                           'active' =>true],
            ['id' => '09', 'description' => 'Disminución en el valor',                'active' =>true],
            ['id' => '10', 'description' => 'Otros Conceptos',                        'active' =>true],
            ['id' => '11', 'description' => 'Ajustes de operaciones de exportación',  'active' =>true],
            ['id' => '12', 'description' => 'Ajustes afectos al IVAP',                'active' =>true],
        ]);

        Schema::create('note_debit_types', function (Blueprint $table) {
            $table->string('id', 2)->index();
            $table->string('description');
            $table->boolean('active');
        });

        DB::table('note_debit_types')->insert([
            ['id' => '01', 'description' => 'Intereses por mora',                    'active' =>true],
            ['id' => '02', 'description' => 'Aumento en el valor',                   'active' =>true],
            ['id' => '03', 'description' => 'Penalidades/ otros conceptos',          'active' =>true],
            ['id' => '10', 'description' => 'Ajustes de operaciones de exportación', 'active' =>true],
            ['id' => '11', 'description' => 'Ajustes afectos al IVAP',               'active' =>true],
        ]);

        Schema::create('operation_types', function (Blueprint $table) {
            $table->string('id', 4)->index();
            $table->string('description');
            $table->boolean('active');
        });

        DB::table('operation_types')->insert([
            ['id' => '0101', 'description' => 'Venta interna',                                                  'active' => true],
            ['id' => '0102', 'description' => 'Venta Interna – Anticipos',                                      'active' => false],
            ['id' => '0103', 'description' => 'Venta interna - Itinerante',                                     'active' => false],
            ['id' => '0110', 'description' => 'Venta Interna - Sustenta Traslado de Mercadería - Remitente ',   'active' => false],
            ['id' => '0111', 'description' => 'Venta Interna - Sustenta Traslado de Mercadería-Transportista',  'active' => false],
            ['id' => '0112', 'description' => 'Venta Interna - Sustenta Gastos Deducibles Persona Natural',     'active' => false],
            ['id' => '0120', 'description' => 'Venta Interna - Sujeta al IVAP',                                 'active' => false],
            ['id' => '0121', 'description' => 'Venta Interna - Sujeta al FISE',                                 'active' => false],
            ['id' => '0122', 'description' => 'Venta Interna - Sujeta a otros impuestos',                       'active' => false],
            ['id' => '0130', 'description' => 'Venta Interna - Realizadas al Estado',                           'active' => false],
            ['id' => '0200', 'description' => 'Exportación de Bienes',                                          'active' => false],
            ['id' => '0201', 'description' => 'Exportación de Servicios – Prestación servicios
                                               realizados íntegramente en el país',                             'active' => false],
            ['id' => '0202', 'description' => 'Exportación de Servicios – Prestación de
                                               servicios de hospedaje No Domiciliado',                          'active' => false],
            ['id' => '0203', 'description' => 'Exportación de Servicios – Transporte de navieras',              'active' => false],
            ['id' => '0204', 'description' => 'Exportación de Servicios – Servicios a naves
                                              y aeronaves de bandera extranjera',                               'active' => false],
            ['id' => '0205', 'description' => 'Exportación de Servicios - Servicios que
                                               conformen un Paquete Turístico',                                 'active' => false],
            ['id' => '0206', 'description' => 'Exportación de Servicios – Servicios
                                               complementarios al transporte de carga',                         'active' => false],
            ['id' => '0207', 'description' => 'Exportación de Servicios – Suministro
                                               de energía eléctrica a favor de sujetos domiciliados en ZED',    'active' => false],
            ['id' => '0208', 'description' => 'Exportación de Servicios – Prestación
                                               servicios realizados parcialmente en el extranjero',             'active' => false],
            ['id' => '0301', 'description' => 'Operaciones con Carta de porte aéreo
                                               (emitidas en el ámbito nacional)',                               'active' => false],
            ['id' => '0302', 'description' => 'Operaciones de Transporte ferroviario de pasajeros',             'active' => false],
            ['id' => '0303', 'description' => 'Operaciones de Pago de regalía petrolera',                       'active' => false],
            ['id' => '1001', 'description' => 'Operación Sujeta a Detracción',                                  'active' => false],
            ['id' => '1002', 'description' => 'Operación Sujeta a Detracción- Recursos Hidrobiológicos',        'active' => false],
        ]);

        Schema::create('process_types', function (Blueprint $table) {
            $table->char('id', 1)->index();
            $table->string('description');
        });

        DB::table('process_types')->insert([
            ['id' => '1', 'description' => 'Adicionar'],
            ['id' => '2', 'description' => 'Modificar'],
            ['id' => '3', 'description' => 'Anulado'],
        ]);

        Schema::create('charge_discount_types', function (Blueprint $table) {
            $table->char('id', 2)->index();
            $table->string('description');
            $table->boolean('base');
            $table->enum('type', ['discount', 'charge']);
            $table->enum('level', ['item', 'global']);
            $table->boolean('active');
        });

        DB::table('charge_discount_types')->insert([
            ['id' => '00', 'description' => 'Descuentos que afectan la base imponible del IGV - Item',               'base' => true,  'level' => 'item',   'type' => 'discount', 'active' =>true],
            ['id' => '01', 'description' => 'Descuentos que no afectan la base imponible del IGV - Item',            'base' => false, 'level' => 'item',   'type' => 'discount', 'active' =>true],
            ['id' => '02', 'description' => 'Descuentos globales que afectan la base imponible del IGV - Global',    'base' => true,  'level' => 'global', 'type' => 'discount', 'active' =>true],
            ['id' => '03', 'description' => 'Descuentos globales que no afectan la base imponible del IGV - Global', 'base' => false, 'level' => 'global', 'type' => 'discount', 'active' =>true],
            ['id' => '45', 'description' => 'FISE - Global',                                                         'base' => true,  'level' => 'global', 'type' => 'charge',   'active' =>false],
            ['id' => '46', 'description' => 'Recargo al consumo y/o propinas - Global',                              'base' => false, 'level' => 'global', 'type' => 'charge',   'active' =>true],
            ['id' => '47', 'description' => 'Cargos que afectan la base imponible del IGV - Item',                   'base' => true,  'level' => 'item',   'type' => 'charge',   'active' =>true],
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charge_discount_types');
        Schema::dropIfExists('operation_types');
        Schema::dropIfExists('unit_types');
        Schema::dropIfExists('identity_document_types');
        Schema::dropIfExists('document_types');
        Schema::dropIfExists('system_isc_types');
        Schema::dropIfExists('affectation_types');
        Schema::dropIfExists('currency_types');
    }
}
