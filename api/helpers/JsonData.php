<?php
/**
 * Created by PhpStorm.
 * User: Ankur Garg
 * Date: 25/4/17
 * Time: 3:04 PM
 */

namespace MyApp\helpers;

class JsonData {
	public static function getArray1() {
		return [
			'match' =>
				[
					'id' => 9,
					'type' => 'T-20',
					'label' => 'Paytm Freedom Match',
					'match_date' => '03-04-2017',
					'teams' =>
						[
							0 =>
								[
									'id' => 1,
									'name' => 'Mumbai Indian',
									'type' => 'Home',
									'players' =>
										[
											0 =>
												[
													'uid' => 688,
													'full_name' => 'Shaun Patrick',
													'nick_name' => 'Shaun',
													'email' => 'shaunp@nottssport.com',
													'mobile' => '',
												],
											1 =>
												[
													'uid' => 691,
													'full_name' => 'Shaun Patrick',
													'nick_name' => 'Shaun',
													'email' => 'shaunp@nottssport.com',
													'mobile' => '',
												],
											2 =>
												[
													'uid' => 774,
													'full_name' => 'Neil Fiarbairn',
													'nick_name' => 'Softers',
													'email' => 'test.neil@misport.com',
													'mobile' => '',
												],
										],
								],
							1 =>
								[
									'id' => 2,
									'name' => 'Royal Challengers Bangalore',
									'type' => 'Away',
									'players' =>
										[
											0 =>
												[
													'uid' => 568,
													'full_name' => 'Laine Spencer',
													'nick_name' => null,
													'email' => 'lainespencer22@aol.com',
													'mobile' => '',
												],
											1 =>
												[
													'uid' => 831,
													'full_name' => '35mph Player',
													'nick_name' => 'Mr 90mph',
													'email' => 'neil.fairbairn@misport.com',
													'mobile' => '',
												],
										],
								],
						],
					'innings' =>
						[
							0 =>
								[
									'id' => 1,
									'batting_team' => 'Mumbai Indian',
									'overs' =>
										[
											0 =>
												[
													'id' => 8,
													'bowler_id' => 1,
													'runs_conceded' => 4,
													'deliveries' =>
														[
														],
												],
											1 =>
												[
													'id' => 9,
													'bowler_id' => 2,
													'runs_conceded' => 6,
													'deliveries' =>
														[
														],
												],
											2 =>
												[
													'id' => 10,
													'bowler_id' => 3,
													'runs_conceded' => 15,
													'deliveries' =>
														[
														],
												],
										],
								],
							1 =>
								[
									'id' => 2,
									'batting_team' => 'Royal Challengers Bangalore',
									'overs' =>
										[
											0 =>
												[
													'id' => 12,
													'bowler_id' => 28,
													'runs_conceded' => 3,
													'deliveries' =>
														[
														],
												],
											1 =>
												[
													'id' => 13,
													'bowler_id' => 29,
													'runs_conceded' => 7,
													'deliveries' =>
														[
														],
												],
										],
								],
						],
				],
			'meta_title' => 'PitchVision.com: Match Detail',
			'meta_description' => '',
			'meta_keywords' => '',
			'_links' =>
				[
					'self' =>
						[
							'href' => 'http://pitchvision/match/info/9',
						],
				],
		];
	}

	public static function getArray2() {
		return [
			'match' =>
				[
					'id' => 9,
					'type' => 'T-200',
					'label' => 'Paytm Freedom Match',
					'match_date' => '03-04-2017',
					'teams' =>
						[
							0 =>
								[
									'id' => 1,
									'name' => 'Mumbai Indian',
									'type' => 'Home',
									'players' =>
										[
											0 =>
												[
													'uid' => 688,
													'full_name' => 'Shaun Patrick',
													'nick_name' => 'Shaun',
													'email' => 'shaunp@nottssport.com',
													'mobile' => '',
												],
											1 =>
												[
													'uid' => 691,
													'full_name' => 'Shaun Patrick',
													'nick_name' => 'Shaun',
													'email' => 'shaunp@nottssport.com',
													'mobile' => '',
												],
											4 =>
												[
													'uid' => 789,
													'full_name' => 'ankur',
													'nick_name' => '456',
													'email' => 'ankur@nottssport.com',
													'mobile' => '98989898989',
												],
										],
								],
							1 =>
								[
									'id' => 2,
									'name' => 'Royal Challengers Bangalore',
									'type' => 'Away',
									'players' =>
										[
											0 =>
												[
													'uid' => 568,
													'full_name' => 'Laine Spencer',
													'nick_name' => null,
													'email' => 'lainespencer22@aol.com',
													'mobile' => '',
												],
											1 =>
												[
													'uid' => 831,
													'full_name' => '35mph Player',
													'nick_name' => 'Mr 90mph',
													'email' => 'neil.fairbairn@misport.com',
												],
										],
								],
						],
					'innings' =>
						[
							0 =>
								[
									'id' => 1,
									'batting_team' => 'Mumbai Indian',
									'overs' =>
										[
											0 =>
												[
													'id' => 8,
													'bowler_id' => 1,
													'runs_conceded' => 40,
													'deliveries' =>
														[
														],
												],
											1 =>
												[
													'id' => 9,
													'bowler_id' => 2,
													'runs_conceded' => 6,
													'deliveries' =>
														[
														],
												],
											2 =>
												[
													'id' => 10,
													'bowler_id' => 3,
													'runs_conceded' => 15,
													'deliveries' =>
														[
														],
												],
										],
								],
							1 => []
						],
				],
			'meta_title' => 'PitchVision.com: Match Detail',
			'meta_description' => '',
			'meta_keywords' => '',
			'_links' =>
				[
					'self' =>
						[
							'href' => 'http://pitchvision/match/info/9',
						],
				],
		];
	}

	public static function getJson1() {
		return '{"currentMatch":{"name":"","teams":[{"players":[{"id":18},{"id":20}],"id":17},{"players":[{"id":19},{"id":20}],"id":17}],"numInnings":1,"numOvers":6,"innings":[{"overs":[{"deliveries":[{"score":{"runs":3,"battingPlayerIndex":1,"bowlingPlayerIndex":1},"id":21},{"score":{"runs":2,"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":22},{"score":{"runs":2,"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":23},{"score":{"dismissal":{"type":"BOWLED"},"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":24}],"id":3},{"deliveries":[],"id":4},{"deliveries":[],"id":5},{"deliveries":[],"id":6},{"deliveries":[],"id":7},{"deliveries":[],"id":8}],"summaryBatting":{"0":{"runs":4,"balls":3,"fours":0,"sixes":0,"dismissal":{"type":"BOWLED","bowlingPlayerIndex":1,"deliveryID":24}},"1":{"runs":1,"balls":1,"fours":0,"sixes":0},"team":{"score":5,"runs":5,"extras":0,"wickets":1},"partnership_0_1":{"runs":5,"extras":0,"score":5}},"summaryBowling":{"1":{"overs":0,"maidens":0,"runs":5,"wickets":1,"extras":0}},"id":2,"battingTeamIndex":0},{"overs":[{"deliveries":[{"score":{"runs":6,"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":25},{"score":{"runs":2,"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":26},{"score":{"runs":4,"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":27},{"score":{"runs":3,"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":28},{"score":{"runs":1,"battingPlayerIndex":1,"bowlingPlayerIndex":1},"id":29}],"id":10},{"deliveries":[],"id":11},{"deliveries":[],"id":12},{"deliveries":[],"id":13},{"deliveries":[],"id":14},{"deliveries":[],"id":15}],"summaryBatting":{"0":{"runs":15,"balls":4,"fours":1,"sixes":1},"1":{"runs":1,"balls":1,"fours":0,"sixes":0},"team":{"score":16,"runs":16,"extras":0,"wickets":0},"partnership_0_1":{"runs":16,"extras":0,"score":16}},"summaryBowling":{"1":{"overs":0,"maidens":0,"runs":16,"wickets":0,"extras":0}},"id":9,"battingTeamIndex":1}],"status":{"type":"CAPTURING","currentInningsIndex":1,"currentOverIndex":0},"currentBattingPlayerIndexes":[0,1],"currentBowlingPlayerIndexes":[1,0],"videos":[],"id":1,"label":"PaytmMatch","date":1496383272328,"summary":"","venue":{"id":16},"options":{"isPitchMapUsed":true,"isShotPlotUsed":true,"isPitchMapFirst":true},"meta":{"revision":30,"created":1496383272330,"version":0,"updated":1496384215396},"$loki":1}}';
		return "{\"match\":{\"innings\":[{\"overs\":[{\"deliveries\":[{\"score\":{\"runs\":\"3\",\"battingPlayerIndex\":5004,\"bowlingPlayerIndex\":5009},\"deliveryId\":4193699},{\"score\":{\"runs\":\"4\",\"battingPlayerIndex\":5004,\"bowlingPlayerIndex\":5009},\"deliveryId\":4193698}],\"overId\":\"4\"}],\"battingTeamIndex\":1,\"inningId\":12}],\"id\":9,\"type\":\"Test\"}}";
	}

	public static function getJson2() {
		return '{"currentMatch":{"name":"","teams":[{"players":[{"id":18},{"id":20}],"id":17},{"players":[{"id":19},{"id":20}],"id":17}],"numInnings":1,"numOvers":6,"innings":[{"overs":[{"deliveries":[{"score":{"runs":1,"battingPlayerIndex":1,"bowlingPlayerIndex":1},"id":21},{"score":{"runs":2,"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":22},{"score":{"runs":2,"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":23},{"score":{"dismissal":{"type":"BOWLED"},"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":24}],"id":3},{"deliveries":[],"id":4},{"deliveries":[],"id":5},{"deliveries":[],"id":6},{"deliveries":[],"id":7},{"deliveries":[],"id":8}],"summaryBatting":{"0":{"runs":4,"balls":3,"fours":0,"sixes":0,"dismissal":{"type":"BOWLED","bowlingPlayerIndex":1,"deliveryID":24}},"1":{"runs":1,"balls":1,"fours":0,"sixes":0},"team":{"score":5,"runs":5,"extras":0,"wickets":1},"partnership_0_1":{"runs":5,"extras":0,"score":5}},"summaryBowling":{"1":{"overs":0,"maidens":0,"runs":5,"wickets":1,"extras":0}},"id":2,"battingTeamIndex":0},{"overs":[{"deliveries":[{"score":{"runs":6,"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":25},{"score":{"runs":2,"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":26},{"score":{"runs":4,"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":27},{"score":{"runs":3,"battingPlayerIndex":0,"bowlingPlayerIndex":1},"id":28},{"score":{"runs":1,"battingPlayerIndex":1,"bowlingPlayerIndex":1},"id":29}],"id":10},{"deliveries":[],"id":11},{"deliveries":[],"id":12},{"deliveries":[],"id":13},{"deliveries":[],"id":14},{"deliveries":[],"id":15}],"summaryBatting":{"0":{"runs":15,"balls":4,"fours":1,"sixes":1},"1":{"runs":1,"balls":1,"fours":0,"sixes":0},"team":{"score":16,"runs":16,"extras":0,"wickets":0},"partnership_0_1":{"runs":16,"extras":0,"score":16}},"summaryBowling":{"1":{"overs":0,"maidens":0,"runs":16,"wickets":0,"extras":0}},"id":9,"battingTeamIndex":1}],"status":{"type":"CAPTURING","currentInningsIndex":1,"currentOverIndex":0},"currentBattingPlayerIndexes":[0,1],"currentBowlingPlayerIndexes":[1,0],"videos":[],"id":1,"label":"PaytmMatch","date":1496383272328,"summary":"","venue":{"id":16},"options":{"isPitchMapUsed":true,"isShotPlotUsed":true,"isPitchMapFirst":true},"meta":{"revision":30,"created":1496383272330,"version":0,"updated":1496384215396},"$loki":1}}';
		return "{\"match\":{\"innings\":[{\"overs\":[{\"deliveries\":[{\"score\":{\"runs\":\"30\",\"battingPlayerIndex\":5004,\"bowlingPlayerIndex\":5009},\"deliveryId\":4193699}],\"overId\":\"4\"},{\"deliveries\":[{\"score\":{\"runs\":\"31\",\"battingPlayerIndex\":5004,\"bowlingPlayerIndex\":5009},\"deliveryId\":4193699}],\"overId\":\"5\"}],\"battingTeamIndex\":1,\"inningId\":12},{\"overs\":[{\"deliveries\":[{\"score\":{\"runs\":\"40\",\"battingPlayerIndex\":5004,\"bowlingPlayerIndex\":5009},\"deliveryId\":4193688}],\"overId\":\"10\"}],\"battingTeamIndex\":2,\"inningId\":13}],\"id\":9}}";
		return "{
  \"match\": {
    \"innings\": [
      {
        \"overs\": [
          {
            \"deliveries\": [
              {
                \"score\": {
                  \"runs\": \"3\",
                  \"battingPlayerIndex\": 5004,
                  \"bowlingPlayerIndex\": 5009
                },
                \"deliveryId\": 4193699
              },
              {
                \"score\": {
                  \"runs\": \"8\",
                  \"battingPlayerIndex\": 5004,
                  \"bowlingPlayerIndex\": 5009
                },
                \"deliveryId\": 4193698
              },
              {
                \"score\": {
                  \"runs\": \"10\",
                  \"battingPlayerIndex\": 5004,
                  \"bowlingPlayerIndex\": 5009
                },
                \"deliveryId\": 4193688
              }
            ],
            \"overId\": \"4\"
          },
          {
            \"deliveries\": [
              {
                \"score\": {
                  \"runs\": \"3\",
                  \"battingPlayerIndex\": 5004,
                  \"bowlingPlayerIndex\": 5009
                },
                \"deliveryId\": 4193799
              }
            ],
            \"overId\": \"5\"
          }
        ],
        \"battingTeamIndex\": 1,
        \"inningId\": 12
      }
    ],
    \"id\": 9,
    \"type\": \"Test\"
  }
}";
	}

}