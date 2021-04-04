<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InventoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('inventory')->delete();

        \DB::table('inventory')->insert(array (
            0 =>
            array (
                'position' => 1,
                'item' => 'Bed - Queen base and mattress',
                'length' => 220,
                'breadth' => 155,
                'height' => 40,
                'volume' => 1364000,
            ),
            1 =>
            array (
                'position' => 2,
                'item' => 'Bed - Double base and mattress ',
                'length' => 220,
                'breadth' => 140,
                'height' => 50,
                'volume' => 1540000,
            ),
            2 =>
            array (
                'position' => 3,
                'item' => 'Bed - King base and mattress',
                'length' => 220,
                'breadth' => 220,
                'height' => 42,
                'volume' => 2032800,
            ),
            3 =>
            array (
                'position' => 4,
                'item' => 'Bed - Single base and mattress',
                'length' => 220,
                'breadth' => 95,
                'height' => 30,
                'volume' => 627000,
            ),
            4 =>
            array (
                'position' => 5,
                'item' => 'Bed - Three quarter base and mattress',
                'length' => 220,
                'breadth' => 110,
                'height' => 35,
                'volume' => 847000,
            ),
            5 =>
            array (
                'position' => 6,
                'item' => 'Bed - Three quarter sleigh bed and mattress',
                'length' => 220,
                'breadth' => 110,
                'height' => 35,
                'volume' => 847000,
            ),
            6 =>
            array (
                'position' => 7,
                'item' => 'Bed - Queen sleigh bed with mattress ',
                'length' => 220,
                'breadth' => 155,
                'height' => 60,
                'volume' => 2046000,
            ),
            7 =>
            array (
                'position' => 8,
                'item' => 'Bed - King sleigh bed with mattress ',
                'length' => 220,
                'breadth' => 220,
                'height' => 60,
                'volume' => 2904000,
            ),
            8 =>
            array (
                'position' => 9,
                'item' => 'Bed - Double sleigh bed with mattress ',
                'length' => 220,
                'breadth' => 140,
                'height' => 60,
                'volume' => 1848000,
            ),
            9 =>
            array (
                'position' => 10,
                'item' => 'Fridge standard',
                'length' => 170,
                'breadth' => 60,
                'height' => 60,
                'volume' => 612000,
            ),
            10 =>
            array (
                'position' => 11,
                'item' => 'Fridge double door',
                'length' => 170,
                'breadth' => 100,
                'height' => 70,
                'volume' => 1190000,
            ),
            11 =>
            array (
                'position' => 12,
                'item' => 'Fridge mini bar fridge ',
                'length' => 70,
                'breadth' => 55,
                'height' => 55,
                'volume' => 211750,
            ),
            12 =>
            array (
                'position' => 13,
                'item' => 'Washing machine top loader',
                'length' => 80,
                'breadth' => 70,
                'height' => 70,
                'volume' => 392000,
            ),
            13 =>
            array (
                'position' => 14,
                'item' => 'Washing machine front loader ',
                'length' => 80,
                'breadth' => 70,
                'height' => 60,
                'volume' => 336000,
            ),
            14 =>
            array (
                'position' => 15,
                'item' => 'Tumble dryer ',
                'length' => 80,
                'breadth' => 70,
                'height' => 60,
                'volume' => 336000,
            ),
            15 =>
            array (
                'position' => 16,
                'item' => 'Microwave ',
                'length' => 60,
                'breadth' => 40,
                'height' => 40,
                'volume' => 96000,
            ),
            16 =>
            array (
                'position' => 17,
                'item' => 'Dishwasher ',
                'length' => 80,
                'breadth' => 70,
                'height' => 60,
                'volume' => 336000,
            ),
            17 =>
            array (
                'position' => 18,
                'item' => 'Chest freezer small',
                'length' => 80,
                'breadth' => 80,
                'height' => 60,
                'volume' => 384000,
            ),
            18 =>
            array (
                'position' => 19,
                'item' => 'Chest freezer medium',
                'length' => 100,
                'breadth' => 80,
                'height' => 70,
                'volume' => 560000,
            ),
            19 =>
            array (
                'position' => 20,
                'item' => 'Chest freezer large ',
                'length' => 120,
                'breadth' => 80,
                'height' => 80,
                'volume' => 768000,
            ),
            20 =>
            array (
                'position' => 21,
                'item' => 'Wingback chair ',
                'length' => 80,
                'breadth' => 70,
                'height' => 70,
                'volume' => 392000,
            ),
            21 =>
            array (
                'position' => 22,
                'item' => 'Tub chair',
                'length' => 80,
                'breadth' => 70,
                'height' => 70,
                'volume' => 392000,
            ),
            22 =>
            array (
                'position' => 23,
                'item' => 'Lounge suite corner L shape',
                'length' => 180,
                'breadth' => 180,
                'height' => 90,
                'volume' => 2916000,
            ),
            23 =>
            array (
                'position' => 24,
                'item' => 'Lounge suite 3 x 2 x 1 seater ',
                'length' => 180,
                'breadth' => 180,
                'height' => 90,
                'volume' => 2916000,
            ),
            24 =>
            array (
                'position' => 25,
                'item' => 'Couch two seater ',
                'length' => 150,
                'breadth' => 80,
                'height' => 80,
                'volume' => 960000,
            ),
            25 =>
            array (
                'position' => 26,
                'item' => 'Couch day bed ',
                'length' => 150,
                'breadth' => 70,
                'height' => 50,
                'volume' => 525000,
            ),
            26 =>
            array (
                'position' => 27,
                'item' => 'Armchair',
                'length' => 80,
                'breadth' => 70,
                'height' => 70,
                'volume' => 392000,
            ),
            27 =>
            array (
                'position' => 28,
                'item' => 'Tv rear projection',
                'length' => 150,
                'breadth' => 100,
                'height' => 6,
                'volume' => 90000,
            ),
            28 =>
            array (
                'position' => 29,
                'item' => 'Tv old box type ',
                'length' => 60,
                'breadth' => 40,
                'height' => 40,
                'volume' => 96000,
            ),
            29 =>
            array (
                'position' => 30,
                'item' => 'Tv flat screen 32\' to 43\'',
                'length' => 60,
                'breadth' => 40,
                'height' => 3,
                'volume' => 7200,
            ),
            30 =>
            array (
                'position' => 31,
                'item' => 'Tv flat screen 50\' to 60\'',
                'length' => 80,
                'breadth' => 60,
                'height' => 4,
                'volume' => 19200,
            ),
            31 =>
            array (
                'position' => 32,
                'item' => 'Tv flat screen 65\' to 75\' ',
                'length' => 120,
                'breadth' => 90,
                'height' => 5,
                'volume' => 54000,
            ),
            32 =>
            array (
                'position' => 33,
                'item' => 'Tv flat screen 80\' to 100\'',
                'length' => 150,
                'breadth' => 100,
                'height' => 6,
                'volume' => 90000,
            ),
            33 =>
            array (
                'position' => 34,
                'item' => 'Tv curved type',
                'length' => 150,
                'breadth' => 100,
                'height' => 6,
                'volume' => 90000,
            ),
            34 =>
            array (
                'position' => 35,
                'item' => 'Tv cabinet low plasma type',
                'length' => 180,
                'breadth' => 50,
                'height' => 50,
                'volume' => 450000,
            ),
            35 =>
            array (
                'position' => 36,
                'item' => 'Tv cabinet large wall unit type',
                'length' => 200,
                'breadth' => 200,
                'height' => 50,
                'volume' => 2000000,
            ),
            36 =>
            array (
                'position' => 37,
                'item' => 'Tv cabinet cupboard type',
                'length' => 150,
                'breadth' => 80,
                'height' => 50,
                'volume' => 600000,
            ),
            37 =>
            array (
                'position' => 38,
                'item' => 'Table coffee small',
                'length' => 60,
                'breadth' => 60,
                'height' => 20,
                'volume' => 72000,
            ),
            38 =>
            array (
                'position' => 39,
                'item' => 'Table coffee medium ',
                'length' => 80,
                'breadth' => 80,
                'height' => 30,
                'volume' => 192000,
            ),
            39 =>
            array (
                'position' => 40,
                'item' => 'Table coffee large',
                'length' => 100,
                'breadth' => 100,
                'height' => 40,
                'volume' => 400000,
            ),
            40 =>
            array (
                'position' => 41,
                'item' => 'Table dining small 100x100',
                'length' => 100,
                'breadth' => 100,
                'height' => 80,
                'volume' => 800000,
            ),
            41 =>
            array (
                'position' => 42,
                'item' => 'Table dining medium 100x150',
                'length' => 150,
                'breadth' => 100,
                'height' => 80,
                'volume' => 1200000,
            ),
            42 =>
            array (
                'position' => 43,
                'item' => 'Table dining large 120x200',
                'length' => 200,
                'breadth' => 120,
                'height' => 80,
                'volume' => 1920000,
            ),
            43 =>
            array (
                'position' => 44,
                'item' => 'Dining sideboard',
                'length' => 160,
                'breadth' => 100,
                'height' => 50,
                'volume' => 800000,
            ),
            44 =>
            array (
                'position' => 45,
                'item' => 'Dining server',
                'length' => 160,
                'breadth' => 100,
                'height' => 50,
                'volume' => 800000,
            ),
            45 =>
            array (
                'position' => 46,
                'item' => 'Dining cupboard',
                'length' => 160,
                'breadth' => 100,
                'height' => 50,
                'volume' => 800000,
            ),
            46 =>
            array (
                'position' => 47,
                'item' => 'Dining chair',
                'length' => 80,
                'breadth' => 45,
                'height' => 45,
                'volume' => 162000,
            ),
            47 =>
            array (
                'position' => 48,
                'item' => 'Bookshelf small ',
                'length' => 170,
                'breadth' => 80,
                'height' => 20,
                'volume' => 272000,
            ),
            48 =>
            array (
                'position' => 49,
                'item' => 'Bookshelf medium',
                'length' => 170,
                'breadth' => 100,
                'height' => 40,
                'volume' => 680000,
            ),
            49 =>
            array (
                'position' => 50,
                'item' => 'Bookshelf large',
                'length' => 170,
                'breadth' => 100,
                'height' => 50,
                'volume' => 850000,
            ),
            50 =>
            array (
                'position' => 51,
                'item' => 'Bookcase small ',
                'length' => 170,
                'breadth' => 80,
                'height' => 20,
                'volume' => 272000,
            ),
            51 =>
            array (
                'position' => 52,
                'item' => 'Bookcase medium',
                'length' => 170,
                'breadth' => 100,
                'height' => 40,
                'volume' => 680000,
            ),
            52 =>
            array (
                'position' => 53,
                'item' => 'Bookcase large',
                'length' => 170,
                'breadth' => 100,
                'height' => 50,
                'volume' => 850000,
            ),
            53 =>
            array (
                'position' => 54,
                'item' => 'Cupboard small',
                'length' => 80,
                'breadth' => 80,
                'height' => 45,
                'volume' => 288000,
            ),
            54 =>
            array (
                'position' => 55,
                'item' => 'Cupboard medium',
                'length' => 150,
                'breadth' => 80,
                'height' => 45,
                'volume' => 540000,
            ),
            55 =>
            array (
                'position' => 56,
                'item' => 'Cupboard large ',
                'length' => 180,
                'breadth' => 100,
                'height' => 45,
                'volume' => 810000,
            ),
            56 =>
            array (
                'position' => 57,
                'item' => 'Showcase or display cabinet',
                'length' => 120,
                'breadth' => 100,
                'height' => 45,
                'volume' => 540000,
            ),
            57 =>
            array (
                'position' => 58,
                'item' => 'Office draw credenza medium ',
                'length' => 80,
                'breadth' => 60,
                'height' => 45,
                'volume' => 216000,
            ),
            58 =>
            array (
                'position' => 59,
                'item' => 'Office draw credenza large',
                'length' => 90,
                'breadth' => 80,
                'height' => 50,
                'volume' => 360000,
            ),
            59 =>
            array (
                'position' => 60,
                'item' => 'Office chair ',
                'length' => 50,
                'breadth' => 50,
                'height' => 50,
                'volume' => 125000,
            ),
            60 =>
            array (
                'position' => 61,
                'item' => 'Desk standard',
                'length' => 120,
                'breadth' => 80,
                'height' => 80,
                'volume' => 768000,
            ),
            61 =>
            array (
                'position' => 62,
                'item' => 'Desk large',
                'length' => 200,
                'breadth' => 80,
                'height' => 80,
                'volume' => 1280000,
            ),
            62 =>
            array (
                'position' => 63,
                'item' => 'Kist ',
                'length' => 80,
                'breadth' => 60,
                'height' => 60,
                'volume' => 288000,
            ),
            63 =>
            array (
                'position' => 64,
                'item' => 'Display cabinet ',
                'length' => 120,
                'breadth' => 100,
                'height' => 45,
                'volume' => 540000,
            ),
            64 =>
            array (
                'position' => 65,
                'item' => 'Suitcase medium ',
                'length' => 120,
                'breadth' => 80,
                'height' => 60,
                'volume' => 576000,
            ),
            65 =>
            array (
                'position' => 66,
                'item' => 'Suitcase large ',
                'length' => 120,
                'breadth' => 120,
                'height' => 80,
                'volume' => 1152000,
            ),
            66 =>
            array (
                'position' => 67,
                'item' => 'Storage cabinet',
                'length' => 130,
                'breadth' => 80,
                'height' => 45,
                'volume' => 468000,
            ),
            67 =>
            array (
                'position' => 68,
                'item' => 'Sleeper couch ',
                'length' => 1425,
                'breadth' => 150,
                'height' => 30,
                'volume' => 6412500,
            ),
            68 =>
            array (
                'position' => 69,
                'item' => 'Shoe cabinet',
                'length' => 130,
                'breadth' => 80,
                'height' => 45,
                'volume' => 468000,
            ),
            69 =>
            array (
                'position' => 70,
                'item' => 'Lamp shade ',
                'length' => 30,
                'breadth' => 30,
                'height' => 20,
                'volume' => 18000,
            ),
            70 =>
            array (
                'position' => 71,
                'item' => 'Headboard medium',
                'length' => 160,
                'breadth' => 100,
                'height' => 15,
                'volume' => 240000,
            ),
            71 =>
            array (
                'position' => 72,
                'item' => 'Headboard large ',
                'length' => 160,
                'breadth' => 100,
                'height' => 30,
                'volume' => 480000,
            ),
            72 =>
            array (
                'position' => 73,
                'item' => 'Futon sleeper couch',
                'length' => 200,
                'breadth' => 150,
                'height' => 30,
                'volume' => 900000,
            ),
            73 =>
            array (
                'position' => 74,
                'item' => 'Four poster bed with mattress ',
                'length' => 220,
                'breadth' => 220,
                'height' => 100,
                'volume' => 4840000,
            ),
            74 =>
            array (
                'position' => 75,
                'item' => 'Dressing table ',
                'length' => 100,
                'breadth' => 100,
                'height' => 50,
                'volume' => 500000,
            ),
            75 =>
            array (
                'position' => 76,
                'item' => 'Drawer small',
                'length' => 60,
                'breadth' => 40,
                'height' => 40,
                'volume' => 96000,
            ),
            76 =>
            array (
                'position' => 77,
                'item' => 'Drawer medium',
                'length' => 80,
                'breadth' => 50,
                'height' => 50,
                'volume' => 200000,
            ),
            77 =>
            array (
                'position' => 78,
                'item' => 'Chest of draws',
                'length' => 100,
                'breadth' => 80,
                'height' => 45,
                'volume' => 360000,
            ),
            78 =>
            array (
                'position' => 79,
                'item' => 'Black plastic bag full',
                'length' => 40,
                'breadth' => 40,
                'height' => 40,
                'volume' => 64000,
            ),
            79 =>
            array (
                'position' => 80,
                'item' => 'Bedside table',
                'length' => 40,
                'breadth' => 40,
                'height' => 50,
                'volume' => 80000,
            ),
            80 =>
            array (
                'position' => 81,
                'item' => 'Bedside pedestal',
                'length' => 40,
                'breadth' => 40,
                'height' => 50,
                'volume' => 80000,
            ),
            81 =>
            array (
                'position' => 82,
                'item' => 'Bedside draw',
                'length' => 40,
                'breadth' => 40,
                'height' => 50,
                'volume' => 80000,
            ),
            82 =>
            array (
                'position' => 83,
                'item' => 'Bag of linen',
                'length' => 40,
                'breadth' => 40,
                'height' => 40,
                'volume' => 64000,
            ),
            83 =>
            array (
                'position' => 84,
                'item' => 'Bag of clothes ',
                'length' => 40,
                'breadth' => 40,
                'height' => 40,
                'volume' => 64000,
            ),
            84 =>
            array (
                'position' => 85,
                'item' => 'Baby sleigh cot ',
                'length' => 80,
                'breadth' => 80,
                'height' => 80,
                'volume' => 512000,
            ),
            85 =>
            array (
                'position' => 86,
                'item' => 'Baby high chair',
                'length' => 80,
                'breadth' => 45,
                'height' => 45,
                'volume' => 162000,
            ),
            86 =>
            array (
                'position' => 87,
                'item' => 'Baby crib',
                'length' => 60,
                'breadth' => 60,
                'height' => 50,
                'volume' => 180000,
            ),
            87 =>
            array (
                'position' => 88,
                'item' => 'Baby cot ',
                'length' => 80,
                'breadth' => 70,
                'height' => 70,
                'volume' => 392000,
            ),
            88 =>
            array (
                'position' => 89,
                'item' => 'Baby compactum',
                'length' => 70,
                'breadth' => 70,
                'height' => 50,
                'volume' => 245000,
            ),
            89 =>
            array (
                'position' => 90,
                'item' => 'Baby changing station',
                'length' => 70,
                'breadth' => 70,
                'height' => 50,
                'volume' => 245000,
            ),
            90 =>
            array (
                'position' => 91,
                'item' => 'Baby bath ',
                'length' => 50,
                'breadth' => 50,
                'height' => 50,
                'volume' => 125000,
            ),
            91 =>
            array (
                'position' => 92,
                'item' => 'Serving tray ',
                'length' => 40,
                'breadth' => 40,
                'height' => 2,
                'volume' => 3200,
            ),
            92 =>
            array (
                'position' => 93,
                'item' => 'Linen basket ',
                'length' => 50,
                'breadth' => 50,
                'height' => 40,
                'volume' => 100000,
            ),
            93 =>
            array (
                'position' => 94,
                'item' => 'Laundry basket ',
                'length' => 50,
                'breadth' => 50,
                'height' => 40,
                'volume' => 100000,
            ),
            94 =>
            array (
                'position' => 95,
                'item' => 'Ironing board',
                'length' => 100,
                'breadth' => 30,
                'height' => 10,
                'volume' => 30000,
            ),
            95 =>
            array (
                'position' => 96,
                'item' => 'Chair',
                'length' => 70,
                'breadth' => 45,
                'height' => 45,
                'volume' => 141750,
            ),
            96 =>
            array (
                'position' => 97,
                'item' => 'Butler tray ',
                'length' => 40,
                'breadth' => 40,
                'height' => 2,
                'volume' => 3200,
            ),
            97 =>
            array (
                'position' => 98,
                'item' => 'Standing lamp',
                'length' => 100,
                'breadth' => 30,
                'height' => 30,
                'volume' => 90000,
            ),
            98 =>
            array (
                'position' => 99,
                'item' => 'Butcher block ',
                'length' => 80,
                'breadth' => 80,
                'height' => 80,
                'volume' => 512000,
            ),
            99 =>
            array (
                'position' => 100,
                'item' => 'Bin small ',
                'length' => 20,
                'breadth' => 20,
                'height' => 30,
                'volume' => 12000,
            ),
            100 =>
            array (
                'position' => 101,
                'item' => 'Bin medium ',
                'length' => 60,
                'breadth' => 40,
                'height' => 40,
                'volume' => 96000,
            ),
            101 =>
            array (
                'position' => 102,
                'item' => 'Pot plant small 20x20 10kg',
                'length' => 20,
                'breadth' => 20,
                'height' => 20,
                'volume' => 8000,
            ),
            102 =>
            array (
                'position' => 103,
                'item' => 'Pot plant medium 40x40 30kg',
                'length' => 40,
                'breadth' => 40,
                'height' => 40,
                'volume' => 64000,
            ),
            103 =>
            array (
                'position' => 104,
                'item' => 'Pot plant large 60x60 60kg',
                'length' => 60,
                'breadth' => 60,
                'height' => 60,
                'volume' => 216000,
            ),
            104 =>
            array (
                'position' => 105,
                'item' => 'Patio table plastic',
                'length' => 120,
                'breadth' => 80,
                'height' => 70,
                'volume' => 672000,
            ),
            105 =>
            array (
                'position' => 106,
                'item' => 'Patio table glass top',
                'length' => 150,
                'breadth' => 90,
                'height' => 80,
                'volume' => 1080000,
            ),
            106 =>
            array (
                'position' => 107,
                'item' => 'Patio swing ',
                'length' => 110,
                'breadth' => 70,
                'height' => 70,
                'volume' => 539000,
            ),
            107 =>
            array (
                'position' => 108,
                'item' => 'Patio storage box',
                'length' => 80,
                'breadth' => 50,
                'height' => 50,
                'volume' => 200000,
            ),
            108 =>
            array (
                'position' => 109,
                'item' => 'Patio lounger ',
                'length' => 90,
                'breadth' => 60,
                'height' => 60,
                'volume' => 324000,
            ),
            109 =>
            array (
                'position' => 110,
                'item' => 'Patio cupboard',
                'length' => 160,
                'breadth' => 100,
                'height' => 45,
                'volume' => 720000,
            ),
            110 =>
            array (
                'position' => 111,
                'item' => 'Patio couch ',
                'length' => 170,
                'breadth' => 80,
                'height' => 80,
                'volume' => 1088000,
            ),
            111 =>
            array (
                'position' => 112,
                'item' => 'Patio chair',
                'length' => 70,
                'breadth' => 60,
                'height' => 60,
                'volume' => 252000,
            ),
            112 =>
            array (
                'position' => 113,
                'item' => 'Braai weber',
                'length' => 70,
                'breadth' => 60,
                'height' => 60,
                'volume' => 252000,
            ),
            113 =>
            array (
                'position' => 114,
                'item' => 'Braai stand standard',
                'length' => 80,
                'breadth' => 40,
                'height' => 20,
                'volume' => 64000,
            ),
            114 =>
            array (
                'position' => 115,
                'item' => 'Braai stand gas type ',
                'length' => 100,
                'breadth' => 80,
                'height' => 40,
                'volume' => 320000,
            ),
            115 =>
            array (
                'position' => 116,
                'item' => 'Wall frame small 50x50x3',
                'length' => 50,
                'breadth' => 50,
                'height' => 3,
                'volume' => 7500,
            ),
            116 =>
            array (
                'position' => 117,
                'item' => 'Wall frame medium 80x80x3',
                'length' => 80,
                'breadth' => 80,
                'height' => 3,
                'volume' => 19200,
            ),
            117 =>
            array (
                'position' => 118,
                'item' => 'Wall frame large 100x120x3',
                'length' => 100,
                'breadth' => 120,
                'height' => 3,
                'volume' => 36000,
            ),
            118 =>
            array (
                'position' => 119,
                'item' => 'Picture portrait small 50x50x3',
                'length' => 50,
                'breadth' => 50,
                'height' => 3,
                'volume' => 7500,
            ),
            119 =>
            array (
                'position' => 120,
                'item' => 'Picture portrait medium 80x80x3',
                'length' => 80,
                'breadth' => 80,
                'height' => 3,
                'volume' => 19200,
            ),
            120 =>
            array (
                'position' => 121,
                'item' => 'Picture portrait large 100x120x3',
                'length' => 100,
                'breadth' => 120,
                'height' => 3,
                'volume' => 36000,
            ),
            121 =>
            array (
                'position' => 122,
                'item' => 'Mirror small 50x50x3',
                'length' => 50,
                'breadth' => 50,
                'height' => 3,
                'volume' => 7500,
            ),
            122 =>
            array (
                'position' => 123,
                'item' => 'Mirror medium 80x80x3',
                'length' => 80,
                'breadth' => 80,
                'height' => 3,
                'volume' => 19200,
            ),
            123 =>
            array (
                'position' => 124,
                'item' => 'Mirror large 100x120x3',
                'length' => 100,
                'breadth' => 120,
                'height' => 3,
                'volume' => 36000,
            ),
            124 =>
            array (
                'position' => 125,
                'item' => 'Trunk medium ',
                'length' => 50,
                'breadth' => 30,
                'height' => 30,
                'volume' => 45000,
            ),
            125 =>
            array (
                'position' => 126,
                'item' => 'Trunk large ',
                'length' => 70,
                'breadth' => 50,
                'height' => 50,
                'volume' => 175000,
            ),
            126 =>
            array (
                'position' => 127,
                'item' => 'Toolbox medium ',
                'length' => 50,
                'breadth' => 30,
                'height' => 30,
                'volume' => 45000,
            ),
            127 =>
            array (
                'position' => 128,
                'item' => 'Toolbox large ',
                'length' => 70,
                'breadth' => 50,
                'height' => 50,
                'volume' => 175000,
            ),
            128 =>
            array (
                'position' => 129,
                'item' => 'Gazebo ',
                'length' => 80,
                'breadth' => 30,
                'height' => 30,
                'volume' => 72000,
            ),
            129 =>
            array (
                'position' => 130,
                'item' => 'Gas heater portable',
                'length' => 70,
                'breadth' => 40,
                'height' => 40,
                'volume' => 112000,
            ),
            130 =>
            array (
                'position' => 131,
                'item' => 'Gas heater outdoor upright',
                'length' => 140,
                'breadth' => 50,
                'height' => 40,
                'volume' => 280000,
            ),
            131 =>
            array (
                'position' => 132,
            'item' => 'Gas cylinder (must be empty)',
                'length' => 50,
                'breadth' => 30,
                'height' => 30,
                'volume' => 45000,
            ),
            132 =>
            array (
                'position' => 133,
                'item' => 'Camping table ',
                'length' => 50,
                'breadth' => 30,
                'height' => 20,
                'volume' => 30000,
            ),
            133 =>
            array (
                'position' => 134,
                'item' => 'Camping chairs ',
                'length' => 40,
                'breadth' => 15,
                'height' => 15,
                'volume' => 9000,
            ),
            134 =>
            array (
                'position' => 135,
                'item' => 'Bicycle small',
                'length' => 80,
                'breadth' => 60,
                'height' => 20,
                'volume' => 96000,
            ),
            135 =>
            array (
                'position' => 136,
                'item' => 'Bicycle large ',
                'length' => 120,
                'breadth' => 80,
                'height' => 25,
                'volume' => 240000,
            ),
            136 =>
            array (
                'position' => 137,
            'item' => 'Bin large (wheelie type)',
                'length' => 110,
                'breadth' => 70,
                'height' => 70,
                'volume' => 539000,
            ),
            137 =>
            array (
                'position' => 138,
                'item' => 'Weed eater ',
                'length' => 80,
                'breadth' => 20,
                'height' => 20,
                'volume' => 32000,
            ),
            138 =>
            array (
                'position' => 139,
                'item' => 'Trampoline small 2,7m / 8ft',
                'length' => 270,
                'breadth' => 270,
                'height' => 100,
                'volume' => 7290000,
            ),
            139 =>
            array (
                'position' => 140,
                'item' => 'Trampoline medium 3,3m / 12ft',
                'length' => 330,
                'breadth' => 330,
                'height' => 120,
                'volume' => 13068000,
            ),
            140 =>
            array (
                'position' => 141,
                'item' => 'Trampoline extra large 4,4m 14ft',
                'length' => 440,
                'breadth' => 440,
                'height' => 150,
                'volume' => 29040000,
            ),
            141 =>
            array (
                'position' => 142,
                'item' => 'Tramloline large 3,8m / 12ft',
                'length' => 380,
                'breadth' => 380,
                'height' => 140,
                'volume' => 20216000,
            ),
            142 =>
            array (
                'position' => 143,
            'item' => 'Tool shed (we can move up to 1.2m x 1.2m)',
                'length' => 120,
                'breadth' => 120,
                'height' => 200,
                'volume' => 2880000,
            ),
            143 =>
            array (
                'position' => 144,
                'item' => 'Lawn mower ',
                'length' => 100,
                'breadth' => 60,
                'height' => 40,
                'volume' => 240000,
            ),
            144 =>
            array (
                'position' => 145,
            'item' => 'Keter tool shed (we can move up to 2m x 2m)',
                'length' => 200,
                'breadth' => 200,
                'height' => 200,
                'volume' => 8000000,
            ),
            145 =>
            array (
                'position' => 146,
                'item' => 'Kennel small 50x50x50',
                'length' => 50,
                'breadth' => 50,
                'height' => 50,
                'volume' => 125000,
            ),
            146 =>
            array (
                'position' => 147,
                'item' => 'Kennel medium 70x70x70',
                'length' => 70,
                'breadth' => 70,
                'height' => 70,
                'volume' => 343000,
            ),
            147 =>
            array (
                'position' => 148,
                'item' => 'Kennel large 100x100x100',
                'length' => 100,
                'breadth' => 100,
                'height' => 100,
                'volume' => 1000000,
            ),
            148 =>
            array (
                'position' => 149,
                'item' => 'Garden umbrella',
                'length' => 100,
                'breadth' => 30,
                'height' => 30,
                'volume' => 90000,
            ),
            149 =>
            array (
                'position' => 150,
                'item' => 'Concrete garden bench ',
                'length' => 100,
                'breadth' => 100,
                'height' => 50,
                'volume' => 500000,
            ),
            150 =>
            array (
                'position' => 151,
                'item' => 'Concrete base garden umbrella',
                'length' => 50,
                'breadth' => 50,
                'height' => 50,
                'volume' => 125000,
            ),
            151 =>
            array (
                'position' => 152,
                'item' => 'Chair plastic stackable ',
                'length' => 50,
                'breadth' => 40,
                'height' => 40,
                'volume' => 80000,
            ),
            152 =>
            array (
                'position' => 153,
                'item' => 'Bar counter medium ',
                'length' => 100,
                'breadth' => 100,
                'height' => 100,
                'volume' => 1000000,
            ),
            153 =>
            array (
                'position' => 154,
                'item' => 'Bar counter large ',
                'length' => 200,
                'breadth' => 100,
                'height' => 100,
                'volume' => 2000000,
            ),
            154 =>
            array (
                'position' => 155,
                'item' => 'Treadmill',
                'length' => 120,
                'breadth' => 100,
                'height' => 50,
                'volume' => 600000,
            ),
            155 =>
            array (
                'position' => 156,
                'item' => 'Spinning bike ',
                'length' => 120,
                'breadth' => 100,
                'height' => 50,
                'volume' => 600000,
            ),
            156 =>
            array (
                'position' => 157,
                'item' => 'Orbitrek',
                'length' => 120,
                'breadth' => 100,
                'height' => 50,
                'volume' => 600000,
            ),
            157 =>
            array (
                'position' => 158,
                'item' => 'Excersise bike',
                'length' => 120,
                'breadth' => 100,
                'height' => 50,
                'volume' => 600000,
            ),
            158 =>
            array (
                'position' => 159,
            'item' => 'Box small (30x30x30)',
                'length' => 30,
                'breadth' => 30,
                'height' => 30,
                'volume' => 27000,
            ),
            159 =>
            array (
                'position' => 160,
            'item' => 'Box medium (40x40x40)',
                'length' => 40,
                'breadth' => 40,
                'height' => 40,
                'volume' => 64000,
            ),
            160 =>
            array (
                'position' => 161,
            'item' => 'Box large (50x50x50)',
                'length' => 50,
                'breadth' => 50,
                'height' => 50,
                'volume' => 125000,
            ),
            161 =>
            array (
                'position' => 162,
                'item' => 'Toy box',
                'length' => 60,
                'breadth' => 40,
                'height' => 30,
                'volume' => 72000,
            ),
            162 =>
            array (
                'position' => 163,
                'item' => 'Piano upright ',
                'length' => 175,
                'breadth' => 175,
                'height' => 175,
                'volume' => 5359375,
            ),
            163 =>
            array (
                'position' => 164,
                'item' => 'Piano baby grand',
                'length' => 180,
                'breadth' => 180,
                'height' => 180,
                'volume' => 5832000,
            ),
        ));


    }
}
